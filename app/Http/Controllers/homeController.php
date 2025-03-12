<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use App\Models\Motorcycle;

use App\Models\Order;

use App\Models\Session;

use Stripe;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
 
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;

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
            ->select('motorcycles.category as category', DB::raw('COUNT(orders.id) as total_sold'))
            ->groupBy('motorcycles.category');

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
        $product = Product::with('category')->get();
        $motorcycles = Motorcycle::with('brand')->get();
        
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
        $product = Product::with('category')->get();
        $motorcycles = Motorcycle::with('brand')->get();

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
        $data = Product::with('category')->find($id);

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

        return view('home.product_details',compact('data','count'));
    }

    public function motorcycle_details($id)
    {
        $data = Motorcycle::with([
            'photos', 
            'brand', 
            'licenseType', 
            'engineType', 
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
            toastr()->timeOut(10000)->closebutton()->addError('Produto não encontrado');
            return redirect()->back();
        }

        if ($product->Quantity <= 0) {
            toastr()->timeOut(10000)->closebutton()->addError('Desculpe, este produto está fora de estoque');
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
                toastr()->timeOut(10000)->closebutton()->addSuccess('Produto adicionado ao carrinho com sucesso');
            } else {
                toastr()->timeOut(10000)->closebutton()->addWarning('Quantidade máxima disponível em estoque atingida');
            }
        } else {
            // Se não existe, cria novo item
        $data = new Cart;
            $data->user_id = $user_id;
            $data->product_id = $id;
            $data->quantity = 1;
            $data->save();
            toastr()->timeOut(10000)->closebutton()->addSuccess('Produto adicionado ao carrinho com sucesso');
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

        // Verifica se há estoque suficiente para todos os produtos (não motos)
        foreach ($cart as $item) {
            if (!$item->is_motorcycle && $item->product_id) {
                $product = Product::find($item->product_id);
                if ($product->Quantity < $item->quantity) {
                    toastr()->timeOut(10000)->closebutton()->addError('Desculpe, não há estoque suficiente para ' . $product->title);
                    return redirect()->back();
                }
            }
        }

        // Gera um número de pedido único
        $orderNumber = 'ORD-' . time() . '-' . $userid;

        foreach ($cart as $item)
        {
            $order = new Order;
            $order->order_number = $orderNumber;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            
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

        // Busca os pedidos criados para enviar por email
        $orderItems = Order::where('order_number', $orderNumber)
            ->with(['product', 'motorcycle', 'motorcycle.photos'])
            ->get();
            
        // Envia o email com a fatura
        try {
            $user = Auth::user();
            Mail::to($user->email)->send(new OrderInvoice($orderNumber, $orderItems, $name));
        } catch (\Exception $e) {
            // Log do erro, mas não interrompe o fluxo
            Log::error('Erro ao enviar email: ' . $e->getMessage());
        }

        Cart::where('user_id', $userid)->delete();

        toastr()->timeOut(10000)->closebutton()->addSuccess('Pedido realizado com sucesso! Enviamos a fatura para seu email.');
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
        

        }


        return view('home.mycart', compact('count','cart'));

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
        // Obter todas as marcas e tipos de licença para os filtros
        $brands = \App\Models\Brand::all();
        $licenseTypes = \App\Models\LicenseType::all();
        
        // Iniciar a query
        $query = Motorcycle::with(['brand', 'licenseType', 'photos']);
        
        // Aplicar filtros
        if ($request->has('license_type') && $request->license_type) {
            $query->where('license_type_id', $request->license_type);
        }
        
        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }
        
        if ($request->has('power') && $request->power) {
            // Verifica se o valor termina com '+' e não contém hífen
            if (str_ends_with($request->power, '+') && !str_contains($request->power, '-')) {
                // Remove o '+' do final e usa o valor como mínimo
                $min = str_replace('+', '', $request->power);
                $query->whereRaw('CAST(displacement AS DECIMAL(10,2)) >= ?', [$min]);
            } else {
                // Caso normal com hífen
                list($min, $max) = explode('-', $request->power);
                if ($max == '+') {
                    $query->whereRaw('CAST(displacement AS DECIMAL(10,2)) >= ?', [$min]);
                } else {
                    $query->whereRaw('CAST(displacement AS DECIMAL(10,2)) BETWEEN ? AND ?', [$min, $max]);
                }
            }
        }
        
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Ordenação
        if ($request->has('sort')) {
            switch ($request->sort) {
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
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'desc'); // Recomendado (padrão)
            }
        } else {
            $query->orderBy('id', 'desc'); // Ordenação padrão
        }
        
        // Paginação
        $motorcycles = $query->paginate(9);
        
        // Verificar se o usuário está logado para o contador do carrinho
        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        
        return view('home.motorcycle_catalog', compact('motorcycles', 'brands', 'licenseTypes', 'count'));
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
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
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

    public function stripePost(Request $request,$value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "eur",

                "source" => $request->stripeToken,

                "description" => "Test payment from complete." 

        ]);      
          return back();

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
            toastr()->timeOut(10000)->closebutton()->addError('Produto não encontrado');
            return redirect()->back();
        }
        
        if ($product->Quantity <= 0) {
            toastr()->timeOut(10000)->closebutton()->addError('Desculpe, este produto está fora de estoque');
            return redirect()->back();
        }
        
        // Verifica se o produto já está no carrinho com o mesmo tamanho
        $existingCart = Cart::where('user_id', $user_id)
                          ->where('product_id', $id)
                          ->where('size', $request->size)
                          ->first();
        
        if ($existingCart) {
            // Se já existe, verifica se pode incrementar a quantidade
            if ($existingCart->quantity < $product->Quantity) {
                $existingCart->quantity += 1;
                $existingCart->save();
                toastr()->timeOut(10000)->closebutton()->addSuccess('Produto adicionado ao carrinho com sucesso');
            } else {
                toastr()->timeOut(10000)->closebutton()->addWarning('Quantidade máxima disponível em estoque atingida');
            }
        } else {
            // Se não existe, cria novo item
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $id;
            $cart->quantity = 1;
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
            toastr()->timeOut(10000)->closebutton()->addSuccess('Tamanho atualizado com sucesso');
        }
        return redirect()->back();
    }

}
