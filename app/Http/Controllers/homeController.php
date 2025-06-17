<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use App\Models\Motorcycle;

use App\Models\Order;

use App\Models\Session;

use App\Models\Wishlist;

use Stripe;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;

use Flasher\Toastr\Prime\ToastrFactory;

use App\Mail\OrderInvoice;
 

class homeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::distinct('order_number')->count('order_number');
        $delivered = Order::where('status', 'delivered')->distinct('order_number')->count('order_number');
        $motorcycle = Motorcycle::all()->count();

        // Dados para o gráfico de vendas no último mês
        $salesData = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonth())
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Dados para o gráfico de categorias mais vendidas
        $productCategories = Order::where('is_motorcycle', 0)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.category_name as category', DB::raw('COUNT(orders.id) as total_sold'))
            ->groupBy('categories.category_name');

        $motorcycleCategories = Order::where('is_motorcycle', 1)
            ->join('motorcycles', 'orders.motorcycle_id', '=', 'motorcycles.id')
            ->join('categories', 'motorcycles.Category', '=', 'categories.id')
            ->select('categories.category_name as category', DB::raw('COUNT(orders.id) as total_sold'))
            ->groupBy('categories.category_name');

        $categories = $productCategories->union($motorcycleCategories)
            ->orderByDesc('total_sold')
            ->get();

        // Extrair as datas e as quantidades de vendas
        $salesDates = $salesData->pluck('date');
        $salesCounts = $salesData->pluck('count');

        // Ganhos Mensais (soma do valor dos pedidos entregues no último mês)
        $monthlyEarnings = 0;
        
        // Soma dos produtos
        $productEarnings = Order::where('status', 'delivered')
            ->where('is_motorcycle', 0)
            ->where('orders.created_at', '>=', now()->startOfMonth())
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->selectRaw('SUM(products.price * orders.quantity) as total')
            ->first();
            
        // Soma das motos
        $motorcycleEarnings = Order::where('status', 'delivered')
            ->where('is_motorcycle', 1)
            ->where('orders.created_at', '>=', now()->startOfMonth())
            ->join('motorcycles', 'orders.motorcycle_id', '=', 'motorcycles.id')
            ->sum('motorcycles.price');
            
        $monthlyEarnings = ($productEarnings->total ?? 0) + $motorcycleEarnings;

        // Ganhos Anuais (soma do valor dos pedidos entregues no último ano)
        $annualEarnings = 0;
        
        // Soma dos produtos
        $productAnnualEarnings = Order::where('status', 'delivered')
            ->where('is_motorcycle', 0)
            ->where('orders.created_at', '>=', now()->startOfYear())
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->selectRaw('SUM(products.price * orders.quantity) as total')
            ->first();
            
        // Soma das motos
        $motorcycleAnnualEarnings = Order::where('status', 'delivered')
            ->where('is_motorcycle', 1)
            ->where('orders.created_at', '>=', now()->startOfYear())
            ->join('motorcycles', 'orders.motorcycle_id', '=', 'motorcycles.id')
            ->sum('motorcycles.price');
            
        $annualEarnings = ($productAnnualEarnings->total ?? 0) + $motorcycleAnnualEarnings;

        return view('admin.index', compact('user', 'product', 'order', 'delivered', 'salesData', 'salesDates', 'salesCounts', 'categories', 'motorcycle', 'monthlyEarnings', 'annualEarnings'));
    }


    public function home()
    {
        $product = Product::with(['category', 'ratings'])->latest()->take(8)->get();
        $motorcycles = Motorcycle::with('brand')->latest()->take(6)->get();
        
        if(Auth::id())
        {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->count();
            return view('home.index', compact('product', 'count', 'motorcycles'));
        }
        else
        {
            return view('home.index', compact('product', 'motorcycles'));
        }
    } 

    public function login_home()
    {
        $product = Product::with('category')->latest()->take(8)->get();
        $motorcycles = Motorcycle::with('brand')->latest()->take(6)->get();

        if(auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.index', compact('product','count', 'motorcycles'));
    }
 
    public function product_details($id)
    {
        $data = Product::with('category', 'ratings.user')->find($id);

        if(auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }

        // Calcular média de estrelas
        $averageRating = $data->ratings->avg('rating');
        $ratingsCount = $data->ratings->count();

        return view('home.product_details',compact('data','count','averageRating','ratingsCount'));
    }

    public function motorcycle_details($id)
    {
        $data = Motorcycle::with([
            'photos', 
            'brand', 
            'licenseType', 
            'lubricationSystem', 
            'clutchType', 
            'ignitionSystem', 
            'startingSystem', 
            'transmissionSystem', 
            'frontSuspension', 
            'rearSuspension'
        ])->find($id);

        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.motorcycle_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        // Primeiro, tenta encontrar uma moto com este ID
        $motorcycle = Motorcycle::find($id);
        if ($motorcycle) {
            // Se for uma moto, usa o método add_motorcycle_cart
            return $this->add_motorcycle_cart($id);
        }

        // Se não for uma moto, procura um produto
       $product = Product::find($id);

        if (!$product) {
            toastr()->timeOut(10000)->closebutton()->addError('Product not found');
            return redirect()->back();
        }

        if ($product->Quantity <= 0) {
            toastr()->timeOut(10000)->closebutton()->addError('Sorry, this product is out of stock');
        return redirect()->back();
        }

        // Verifica se o produto já está no carrinho
        $existingCart = Cart::where('user_id', $user_id)
                          ->where('product_id', $id)
                          ->first();

         if ($existingCart) {
         // Se já existe, verifica se pode incrementar a quantidade
        if ($existingCart->quantity < $product->Quantity) {
            $existingCart->quantity += 1;
            $existingCart->save();
            toastr()->timeOut(10000)->closeButton()->addSuccess('Product successfully added to the cart');
        } else {
            toastr()->timeOut(10000)->closeButton()->addWarning('Maximum available stock quantity reached');
        }
    } else {
             // Se não existe, cria novo item
             $data = new Cart;
             $data->user_id = $user_id;
             $data->product_id = $id;
             $data->quantity = 1;
             $data->save();
             toastr()->timeOut(10000)->closeButton()->addSuccess('Product successfully added to the cart');
            }


        return redirect()->back();
    }

    public function update_quantity(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        if ($cart) {
            $product = Product::find($cart->product_id);
            $requestedQuantity = max(1, $request->quantity); // Garante que a quantidade seja pelo menos 1
            
            if ($requestedQuantity > $product->Quantity) {
                $cart->quantity = $product->Quantity;
                toastr()->timeOut(10000)->closebutton()->addWarning('Quantidade ajustada para o máximo disponível em estoque');
            } else {
                $cart->quantity = $requestedQuantity;
                toastr()->timeOut(10000)->closebutton()->addSuccess('Quantidade atualizada com sucesso');
            }
            
            $cart->save();
        }
        return redirect()->back();
    }

    public function add_motorcycle_cart($id)
    {
        $motorcycle_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $motorcycle = Motorcycle::find($motorcycle_id);
        
        // Verifica se a moto já está no carrinho
        $existingCart = Cart::where('user_id', $user_id)
                          ->where('motorcycle_id', $motorcycle_id)
                          ->first();

        if ($existingCart) {
            toastr()->timeOut(10000)->closebutton()->addWarning('Esta moto já está no seu carrinho');
            return redirect()->back();
        } else {
            // Se não existe, cria novo item
            $data = new Cart;
            $data->user_id = $user_id;
            $data->motorcycle_id = $motorcycle_id;
            $data->product_id = null; // Definir explicitamente como NULL
            $data->quantity = 1; // Motos sempre terão quantidade 1
            $data->is_motorcycle = true; // Flag para identificar que é uma moto
        $data->save();
            toastr()->timeOut(10000)->closebutton()->addSuccess('Moto adicionada ao carrinho com sucesso');
        }

        return redirect()->back();
    }

    public function comfirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        $usePoints = $request->has('use_points');
        $user = Auth::user();
        
        // Captura o método de entrega e localização da loja
        $deliveryMethod = $request->delivery_method;
        $storeLocation = $deliveryMethod === 'store' ? $request->store_location : null;

        // Verifica se há estoque suficiente para todos os produtos (não motos)
        foreach ($cart as $item) {
            if (!$item->is_motorcycle && $item->product_id) {
                $product = Product::find($item->product_id);
                if ($product->Quantity < $item->quantity) {
                    toastr()->timeOut(10000)->closebutton()->addError('Sorry, there is not enough stock for ' . $product->title);
                    return redirect()->back();
                }
            }
        }

        // Gera um número de pedido único
        $orderNumber = 'ORD-' . time() . '-' . $userid;
        
        // Calcula o valor total do pedido para pontos e desconto
        $totalAmount = 0;
        foreach ($cart as $item) {
            if ($item->is_motorcycle) {
                $totalAmount += $item->motorcycle->price;
            } else {
                $totalAmount += $item->product->price * $item->quantity;
            }
        }
        
        // Aplica desconto de pontos se solicitado
        $discount = 0;
        $pointsUsed = 0;
        if ($usePoints && $user->Points > 0) {
            // Obtém a quantidade de pontos a serem usados
            $pointsToUse = (int)$request->input('points_to_use');
            
            // Verifica se o valor é válido
            if ($pointsToUse <= 0) {
                $pointsToUse = 1000; // Valor mínimo
            }
            
            // Limita ao total de pontos disponíveis
            $pointsToUse = min($pointsToUse, $user->Points);
            
            // Garante que os pontos sejam múltiplos de 1000
            $pointsToUse = floor($pointsToUse / 1000) * 1000;
            
            // Calcula o desconto (1% por cada 1000 pontos)
            $discountPercentage = floor($pointsToUse / 1000);
            
            // Limita o desconto a 10% do valor total
            $maxDiscountPercentage = 10;
            if ($discountPercentage > $maxDiscountPercentage) {
                $discountPercentage = $maxDiscountPercentage;
                $pointsToUse = $discountPercentage * 1000;
            }
            
            // Calcula o valor do desconto
            $discount = $totalAmount * ($discountPercentage / 100);
            
            // Limita o desconto ao valor total
            $discount = min($discount, $totalAmount);
            
            // Atualiza os pontos do usuário
            User::where('id', $user->id)->update(['Points' => $user->Points - $pointsToUse]);
        }
        
        // Valor final após desconto
        $finalAmount = $totalAmount - $discount;

        foreach ($cart as $item)
        {
            $order = new Order;
            $order->order_number = $orderNumber;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            
            // Salva o método de entrega e localização da loja
            $order->delivery_method = $deliveryMethod;
            $order->store_location = $storeLocation;
            
            // Salva a informação de pontos usados apenas no primeiro item do pedido
            if ($pointsUsed > 0 && $cart->first()->id == $item->id) {
                $order->points_used = $pointsUsed;
            } else {
                $order->points_used = 0; // Garante que os outros itens tenham 0 pontos usados
            }
            
            if ($item->is_motorcycle) {
                $order->motorcycle_id = $item->motorcycle_id;
                $order->is_motorcycle = true;
            } else {
                $order->product_id = $item->product_id;
                $order->quantity = $item->quantity;
                $order->size = $item->size;
                
                // Atualiza o estoque do produto
                $product = Product::find($item->product_id);
                $product->Quantity -= $item->quantity;
                $product->save();
            }
            
            $order->save();
        }
        
        // Adiciona pontos ao usuário (10€ = 5 pontos) apenas se não usou pontos para desconto
        if ($pointsUsed == 0) {
            $pointsEarned = floor(($totalAmount / 10) * 5);
            if ($pointsEarned > 0) {
                User::where('id', $user->id)->increment('Points', $pointsEarned);
                Log::info('Pontos adicionados: ' . $pointsEarned);
            }
        } else {
            Log::info('Points not added because user used points for discount');
        }
        
        // Busca os pedidos criados para enviar por email
        $orderItems = Order::where('order_number', $orderNumber)
            ->with(['product', 'motorcycle', 'motorcycle.photos'])
            ->get();
            
        // Envia o email com a fatura
        try {
            $user = Auth::user();
            Mail::to($user->email)->send(new OrderInvoice(
                $orderNumber, 
                $orderItems, 
                $name, 
                [
                    'discount' => $discount,
                    'points_used' => $pointsUsed,
                    'total_before_discount' => $totalAmount,
                    'total_after_discount' => $finalAmount
                ]
            ));
        } catch (\Exception $e) {
            // Log do erro, mas não interrompe o fluxo
            Log::error('Erro ao enviar email: ' . $e->getMessage());
        }

        Cart::where('user_id', $userid)->delete();

        $successMessage = 'Pedido realizado com sucesso!';
        if ($pointsUsed > 0) {
            $successMessage .= ' Você usou ' . $pointsUsed . ' pontos para obter ' . number_format($discount, 2) . '€ de desconto.';
        }
        $successMessage .= ' Enviamos a fatura para seu email.';
        
        toastr()->timeOut(10000)->closebutton()->addSuccess($successMessage);
        return redirect()->back();
    }



    public function mycart()
    {
        if(auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
            $userPoints = $user->Points;
            
            return view('home.mycart', compact('count','cart', 'userPoints'));
        }
        
        return redirect('login');
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);
        
        $data-> delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Product removed from the Cart Sucessfully');

        return redirect()->back();
    }

    public function myorders()
    {
        try {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            
            // Usando eager loading para carregar os produtos relacionados
            $orders = Order::with('product')
                ->where('user_id', $userid)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('home.myorders', compact('count', 'orders'));
        } catch (\Exception $e) {
            toastr()->timeOut(10000)->closebutton()->addError('Erro ao carregar os pedidos. Por favor, tente novamente.');
            return redirect()->back();
        }
    }

    public function motorcycleCatalog(Request $request)
    {
        $query = Motorcycle::query();

        // Search by name
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Existing filters
        if ($request->has('license_type') && !empty($request->license_type)) {
            $query->where('license_type_id', $request->license_type);
        }

        if ($request->has('brand') && !empty($request->brand)) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('Category', $request->category);
        }

        // Filtro de cilindrada
        if ($request->has('power') && !empty($request->power)) {
            switch ($request->power) {
                case '0-50':
                    $query->where('displacement', '<=', 50);
                    break;
                case '51-125':
                    $query->where('displacement', '>', 50)->where('displacement', '<=', 125);
                    break;
                case '126-250':
                    $query->where('displacement', '>', 125)->where('displacement', '<=', 250);
                    break;
                case '251-500':
                    $query->where('displacement', '>', 250)->where('displacement', '<=', 500);
                    break;
                case '501-750':
                    $query->where('displacement', '>', 500)->where('displacement', '<=', 750);
                    break;
                case '751-1000':
                    $query->where('displacement', '>', 750)->where('displacement', '<=', 1000);
                    break;
                case '1001+':
                    $query->where('displacement', '>', 1000);
                    break;
            }
        }

        // Ordenação
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Get the filtered results with eager loading
        $motorcycles = $query->with(['brand', 'licenseType', 'photos'])->paginate(9);

        // Get data for filter dropdowns with all columns
        $brands = \App\Models\Brand::all();
        
        // Ordenar tipos de licença na ordem específica
        $licenseTypes = \App\Models\LicenseType::orderByRaw("
            CASE 
                WHEN type = 'A' THEN 1
                WHEN type = 'A1' THEN 2
                WHEN type = 'A2' THEN 3
                WHEN type = 'Competitive' THEN 4
                ELSE 5
            END
        ")->get();
        
        // Obter apenas categorias que têm motos associadas
        $categories = \App\Models\Category::whereHas('motorcycles')->get();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.motorcycle_catalog', compact('motorcycles', 'brands', 'licenseTypes', 'categories', 'count'));
    }

    public function productCatalog(Request $request)
    {
        // Obter apenas categorias que têm produtos associados
        $categories = \App\Models\Category::whereHas('products')->get();
        
        // Iniciar a query
        $query = Product::with('category');
        
        // Aplicar filtros
        if ($request->has('category') && $request->category) {
            // Filtrando pela categoria selecionada
            $query->where('category_id', $request->category);
        }
        
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }
        
        if ($request->has('search') && $request->search) {
            $search = strtolower($request->search);
            $query->where(function($q) use ($search) {
                $q->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"]);
            });
        }
        
        // Ordenação
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderByRaw('CAST(REPLACE(REPLACE(price, ".", ""), ",", ".") AS DECIMAL(10,2)) asc');
                    break;
                case 'price_desc':
                    $query->orderByRaw('CAST(REPLACE(REPLACE(price, ".", ""), ",", ".") AS DECIMAL(10,2)) desc');
                    break;
                case 'name_asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('title', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'desc');
            }
        } else {
            $query->orderBy('id', 'desc');
        }
        
        // Paginação
        $products = $query->paginate(9);
        
        // Verificar se o usuário está logado para o contador do carrinho
        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        
        return view('home.Product_catalog', compact('products', 'count', 'categories'));
    }

    public function stripe($value)

    {

        return view('home.stripe', compact('value'));

    }

    public function stripePost(Request $request, $value)
    {
        try {
            if(!Auth::check()) {
                return redirect('login');
            }
            
            $user = Auth::user();
            $userid = $user->id;
            $cart = Cart::where('user_id', $userid)->get();
            
            // Verificar se o carrinho está vazio
            if($cart->isEmpty()) {
                toastr()->timeOut(10000)->closebutton()->addError('Your Cart is Empty');
                return redirect('/');
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Processar o pagamento
            Stripe\Charge::create([
                "amount" => $value * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Payment in Bikes By Fazenda" 
            ]);
            
            // Gerar número de pedido único
            $orderNumber = 'ORD-' . time() . '-' . $userid;
            
            // Salvar os itens do pedido
            foreach ($cart as $item) {
                $order = new Order;
                $order->order_number = $orderNumber;
                $order->name = $user->name;
                $order->rec_address = $user->address ?? 'Endereço não fornecido';
                $order->phone = $user->phone ?? 'Telefone não fornecido';
                $order->user_id = $userid;
                $order->payment_status = 'Pago';
                $order->status = 'Em Processamento';
                
                // Método de entrega padrão quando a compra é feita pelo Stripe
                $order->delivery_method = 'delivery';
                
                if ($item->is_motorcycle) {
                    $order->motorcycle_id = $item->motorcycle_id;
                    $order->is_motorcycle = true;
                } else {
                    $order->product_id = $item->product_id;
                    $order->quantity = $item->quantity;
                    $order->size = $item->size;
                    
                    // Atualizar o estoque do produto
                    $product = Product::find($item->product_id);
                    if ($product) {
                        $product->Quantity -= $item->quantity;
                        $product->save();
                    }
                }
                
                $order->save();
            }
            
            // Adicionar pontos ao utilizador (10€ = 5 pontos)
            $pointsEarned = floor(($value / 10) * 5);
            if ($pointsEarned > 0) {
                User::where('id', $user->id)->increment('Points', $pointsEarned);
            }
            
            // Buscar os pedidos criados para enviar por email
            $orderItems = Order::where('order_number', $orderNumber)
                ->with(['product', 'motorcycle', 'motorcycle.photos'])
                ->get();
                
            // Enviar email com a fatura
            try {
                Mail::to($user->email)->send(new OrderInvoice(
                    $orderNumber, 
                    $orderItems, 
                    $user->name, 
                    [
                        'discount' => 0,
                        'points_used' => 0,
                        'total_before_discount' => $value,
                        'total_after_discount' => $value
                    ]
                ));
            } catch (\Exception $e) {
                // Log do erro, mas não interrompe o fluxo
                Log::error('Erro ao enviar email: ' . $e->getMessage());
            }
            
            // Limpar o carrinho de compras
            Cart::where('user_id', $userid)->delete();
            
            // Adicionar mensagem toastr e redirecionar
            toastr()->timeOut(10000)->closebutton()->addSuccess('Pagamento realizado com sucesso! Obrigado pela sua compra. Enviamos a fatura para seu email.');
            
            return redirect('/');
        } catch (\Exception $e) {
            // Em caso de erro, retornar com mensagem de erro
            toastr()->timeOut(10000)->closebutton()->addError('Erro no processamento do pagamento: ' . $e->getMessage());
            
            return back();
        }
    }

    public function add_cart_with_size(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        $user = Auth::user();
        $user_id = $user->id;
        
        // Busca o produto
        $product = Product::find($id);
        if (!$product) {
            toastr()->timeOut(10000)->closebutton()->addError('Product not found');
            return redirect()->back();
        }

        if ($product->Quantity <= 0) {
            toastr()->timeOut(10000)->closebutton()->addError('Sorry, this product is out of stock');
        return redirect()->back();
        }

        
        // Obtém a quantidade solicitada (padrão: 1)
        $requestedQuantity = $request->quantity ?? 1;
        
        // Verifica se a quantidade solicitada é válida
        if ($requestedQuantity > $product->Quantity) {
            toastr()->timeOut(10000)->closebutton()->addWarning('Quantidade solicitada excede o estoque disponível');
            $requestedQuantity = $product->Quantity;
        }
        
        // Verifica se o produto já está no carrinho com o mesmo tamanho
        $existingCart = Cart::where('user_id', $user_id)
                          ->where('product_id', $id)
                          ->where('size', $request->size)
                          ->first();
        
        if ($existingCart) {
            // Se já existe, verifica se pode incrementar a quantidade
            $newQuantity = $existingCart->quantity + $requestedQuantity;
            
            if ($newQuantity <= $product->Quantity) {
                $existingCart->quantity = $newQuantity;
                $existingCart->save();
                toastr()->timeOut(10000)->closebutton()->addSuccess('Produto adicionado ao carrinho com sucesso');
            } else {
                $existingCart->quantity = $product->Quantity;
                $existingCart->save();
                toastr()->timeOut(10000)->closebutton()->addWarning('Quantidade máxima disponível em estoque atingida');
            }
        } else {
            // Se não existe, cria novo item
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $id;
            $cart->quantity = $requestedQuantity;
            $cart->size = $request->size;
            $cart->save();
            toastr()->timeOut(10000)->closebutton()->addSuccess('Produto adicionado ao carrinho com sucesso');
        }
        
        return redirect()->back();
    }

    public function update_size(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        if ($cart) {
            $cart->size = $request->size;
            $cart->save();
            toastr()->timeOut(10000)->closebutton()->addSuccess('Size Updated Successful');
        }
        return redirect()->back();
    }

    // Método para adicionar produto à lista de desejos
    public function add_to_wishlist($id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            
            // Verificar se o produto já está na lista de desejos
            $wishlist = Wishlist::where('user_id', $user->id)
                ->where('product_id', $id)
                ->where('is_motorcycle', 0)
                ->first();
                
            if (!$wishlist) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $id,
                    'is_motorcycle' => 0
                ]);
                
                return redirect()->back()->with('message', 'Produto adicionado à lista de desejos!');
            } else {
                return redirect()->back()->with('message', 'Este produto já está na sua lista de desejos!');
            }
        } else {
            return redirect('login');
        }
    }
    
    // Método para adicionar moto à lista de desejos
    public function add_motorcycle_to_wishlist($id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            
            // Verificar se a moto já está na lista de desejos
            $wishlist = Wishlist::where('user_id', $user->id)
                ->where('motorcycle_id', $id)
                ->where('is_motorcycle', 1)
                ->first();
                
            if (!$wishlist) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'motorcycle_id' => $id,
                    'is_motorcycle' => 1
                ]);
                
                return redirect()->back()->with('message', 'Moto adicionada à lista de desejos!');
            } else {
                return redirect()->back()->with('message', 'Esta moto já está na sua lista de desejos!');
            }
        } else {
            return redirect('login');
        }
    }
    
    // Método para exibir a lista de desejos
    public function mywishlist()
    {
        if (Auth::id()) {
            $user = Auth::user();
            
            // Buscar produtos na lista de desejos
            $wishlist_products = Wishlist::where('user_id', $user->id)
                ->where('is_motorcycle', 0)
                ->with('product')
                ->get();
                
            // Buscar motos na lista de desejos
            $wishlist_motorcycles = Wishlist::where('user_id', $user->id)
                ->where('is_motorcycle', 1)
                ->with('motorcycle')
                ->get();
                
            // Contar itens no carrinho para o header
            $count = Cart::where('user_id', $user->id)->count();
                
            return view('home.wishlist', compact('wishlist_products', 'wishlist_motorcycles', 'count'));
        } else {
            return redirect('login');
        }
    }
    
    // Método para remover item da lista de desejos
    public function delete_wishlist_item($id)
    {
        if (Auth::id()) {
            Wishlist::where('id', $id)->delete();
            return redirect()->back()->with('message', 'Item removido da lista de desejos!');
        } else {
            return redirect('login');
        }
    }
    
    // Método para mover item da lista de desejos para o carrinho
    public function move_to_cart($id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $wishlist_item = Wishlist::findOrFail($id);
            
            if ($wishlist_item->is_motorcycle) {
                // Adicionar moto ao carrinho
                $motorcycle_id = $wishlist_item->motorcycle_id;
                
                // Verificar se a moto já está no carrinho
                $cart = Cart::where('user_id', $user->id)
                    ->where('motorcycle_id', $motorcycle_id)
                    ->where('is_motorcycle', 1)
                    ->first();
                    
                if (!$cart) {
                    Cart::create([
                        'user_id' => $user->id,
                        'motorcycle_id' => $motorcycle_id,
                        'is_motorcycle' => 1,
                        'quantity' => 1
                    ]);
                }
            } else {
                // Adicionar produto ao carrinho
                $product_id = $wishlist_item->product_id;
                
                // Verificar se o produto já está no carrinho
                $cart = Cart::where('user_id', $user->id)
                    ->where('product_id', $product_id)
                    ->where('is_motorcycle', 0)
                    ->first();
                    
                if (!$cart) {
                    Cart::create([
                        'user_id' => $user->id,
                        'product_id' => $product_id,
                        'is_motorcycle' => 0,
                        'quantity' => 1
                    ]);
                } else {
                    $cart->quantity += 1;
                    $cart->save();
                }
            }
            
            // Remover item da lista de desejos
            $wishlist_item->delete();
            
            return redirect()->back()->with('message', 'Item movido para o carrinho!');
        } else {
            return redirect('login');
        }
    }

    // Método para exibir a página de pontos de fidelidade
    public function loyalty_points()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            
            // Busca os pedidos do usuário para mostrar o histórico de pontos
            $orders = Order::where('user_id', $userid)
                ->select('order_number', 'created_at')
                ->distinct('order_number')
                ->orderBy('created_at', 'desc')
                ->get();
                
            // Inicializa o histórico de pontos
            $pointsHistory = [];
            
            // Para cada pedido, adiciona uma entrada para pontos ganhos e outra para pontos usados (se houver)
            foreach ($orders as $order) {
                // Busca apenas o primeiro item de cada pedido para evitar duplicação
                $firstItem = Order::where('order_number', $order->order_number)
                    ->where('user_id', $userid)
                    ->first();
                
                if (!$firstItem) continue;
                
                // Calcula o valor total do pedido
                $orderItems = Order::where('order_number', $order->order_number)
                    ->where('user_id', $userid)
                    ->get();
                
                $orderTotal = 0;
                foreach ($orderItems as $item) {
                    if ($item->is_motorcycle && $item->motorcycle) {
                        $orderTotal += $item->motorcycle->price;
                    } elseif ($item->product) {
                        $orderTotal += $item->product->price * $item->quantity;
                    }
                }
                
                // Se pontos foram usados, adiciona uma entrada para pontos usados
                if ($firstItem->points_used > 0) {
                    $pointsHistory[] = [
                        'order_number' => $order->order_number,
                        'date' => $order->created_at,
                        'total' => $orderTotal,
                        'points' => $firstItem->points_used,
                        'type' => 'used'
                    ];
                }
                
                // Calcula os pontos ganhos (10€ = 5 pontos)
                $pointsEarned = floor(($orderTotal / 10) * 5);
                
                // Adiciona entrada para pontos ganhos
                if ($pointsEarned > 0) {
                    $pointsHistory[] = [
                        'order_number' => $order->order_number,
                        'date' => $order->created_at,
                        'total' => $orderTotal,
                        'points' => $pointsEarned,
                        'type' => 'earned'
                    ];
                }
            }
            
            // Ordena o histórico por data (mais recente primeiro)
            usort($pointsHistory, function($a, $b) {
                return $b['date']->timestamp - $a['date']->timestamp;
            });
            
            return view('home.loyalty_points', compact('count', 'user', 'pointsHistory'));
        }
        
        return redirect('login');
    }

    public function findStore()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.find_store', compact('count'));
    }

    public function rateProduct(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Você precisa estar logado para avaliar.');
        }

        $user = Auth::user();

        // Impede que o mesmo usuário avalie o mesmo produto mais de uma vez
        $existing = \App\Models\ProductRating::where('user_id', $user->id)->where('product_id', $id)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Você já avaliou este produto.');
        }

        \App\Models\ProductRating::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Avaliação enviada com sucesso!');
    }

}
