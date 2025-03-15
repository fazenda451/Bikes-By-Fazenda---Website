<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Brand;
use App\Models\EngineType;
use App\Models\LubricationSystem;
use App\Models\ClutchType;
use App\Models\IgnitionSystem;
use App\Models\StartingSystem;
use App\Models\TransmissionSystem;
use App\Models\Suspension;
use App\Models\LicenseType;
use App\Models\Motorcycle;
use App\Models\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category',compact('data'));
    }

    public function add_Category(Request $request)
    {

        $category = new Category;

        $category->category_name = $request-> category;

        $category->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Category Added Sucessfully');

        return redirect()->back();

    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data-> delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Category Deleted Sucessfully');

        return redirect()-> back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        
        $data->category_name= $request->category;

        $data->save();
        
        toastr()->timeOut(10000)->closebutton() ->addSuccess('Category Updated Sucessfully');

        return redirect('/view_category');
    }



    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));

    }

    public function upload_product(Request $request)
    {

        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->qty;

        $data->category_id = $request->category_id;

        $data->size = $request->size;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;

        }

        $data->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Product Added Sucessfully');

        return redirect()->back();

    }

    public function view_product()
    {
        $product = Product::with('category')->paginate(4);

        return view('Admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if (file_exists($image_path))

        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Category deleted Sucessfully');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

         $data->description = $request->description;

         $data->price = $request->price;

         $data->quantity = $request->quantity;

         $data->category_id = $request->category_id;

         $data->size = $request->size;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'. $image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;

        }

        $data->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Product Updated Sucessfully');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::with('category')
            ->where('title', 'LIKE', '%'.$search.'%')
            ->orWhereHas('category', function($query) use ($search) {
                $query->where('category_name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(3);

        return view('admin.view_product', compact('product')); 
    }


    public function view_orders()
    {
        $data = Order::all();

        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {
        $order = Order::find($id);
        
        if ($order) {
            // Atualiza todos os itens do mesmo pedido
            $orderNumber = $order->order_number;
            Order::where('order_number', $orderNumber)->update(['status' => 'On the way']);
            
            toastr()->timeOut(10000)->closebutton()->addSuccess('Status dos itens atualizado para Em Trânsito');
        }

        return redirect('/view_orders');
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        
        if ($order) {
            // Atualiza todos os itens do mesmo pedido
            $orderNumber = $order->order_number;
            Order::where('order_number', $orderNumber)->update(['status' => 'Delivered']);
            
            toastr()->timeOut(10000)->closebutton()->addSuccess('Status dos itens atualizado para Entregue');
        }

        return redirect('/view_orders');
    }

    public function print_pdf($orderNumber)
    {
        $orderItems = Order::where('order_number', $orderNumber)->with('product')->get();
        
        if ($orderItems->count() > 0) {
            $pdf = Pdf::loadView('admin.invoice', compact('orderItems', 'orderNumber'));
            return $pdf->download('invoice-' . $orderNumber . '.pdf');
        }
        
        return redirect()->back();
    }

    public function view_brand()
    {
        $data = Brand::all();

        return view('admin.brand', compact('data'));
    }

    public function add_brand(Request $request)
    {

        $brand = new Brand;

        $brand->brand_name = $request-> brand;

        $brand->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Brand Added Sucessfully');

        return redirect()->back();

    }

    public function delete_brand($id)
    {
        $data = Brand::find($id);

        $data-> delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Brand Deleted Sucessfully');

        return redirect()-> back();
    }

    public function edit_brand($id)
    {
        $data = Brand::find($id);

        return view('admin.edit_brand',compact('data'));
    }

    public function update_brand(Request $request,$id)
    {
        $data = Brand::find($id);
        
        $data->brand_name = $request->brand;

        $data->save();
        
        toastr()->timeOut(10000)->closebutton() ->addSuccess('Brand Updated Sucessfully');

        return redirect('/view_brand');
    }

public function view_engine()
    {
        $data = EngineType::all();

        return view('admin.engine', compact('data'));
    }

    public function add_engine(Request $request)
    {

        $EngineType = new EngineType();

        $EngineType-> type = $request-> EngineType ;

        $EngineType->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Engine Added Sucessfully');

        return redirect()->back();

    }

    public function delete_engine($id)
    {
        $EngineType = EngineType::find($id);

        $EngineType-> delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Engine Deleted Sucessfully');

        return redirect()-> back();
    }

    public function edit_engine($id)
    {
        $data = EngineType::find($id);

        return view('admin.edit_engine',compact('data'));
    }

    public function update_engine(Request $request,$id)
    {
        $data = EngineType::find($id);
        
        $data->type = $request-> EngineType; 

        $data->save();
        
        toastr()->timeOut(10000)->closebutton() ->addSuccess('Engine Updated Sucessfully');

        return redirect('/view_engine');
    }

    public function view_lubrication()
    {
        $data = LubricationSystem::all();

        return view('admin.lubrication', compact('data'));
    }

    public function add_lubrication(Request $request)
    {

        $LubricationSystem = new LubricationSystem();

        $LubricationSystem-> system = $request-> LubricationSystem;

        $LubricationSystem->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Lubrication Added Sucessfully');

        return redirect()->back();

    }

    public function delete_lubrication($id)
    {
        $LubricationSystem = LubricationSystem::find($id);

        $LubricationSystem -> delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Lubrication Deleted Sucessfully');

        return redirect()-> back();
    }

    public function edit_lubrication($id)
    {
        $data = LubricationSystem::find($id);

        return view('admin.edit_lubrication',compact('data'));
    }

    public function update_lubrication(Request $request,$id)
    {
        $data = LubricationSystem::find($id);
        
        $data->system = $request-> LubricationSystem; 

        $data->save();
        
        toastr()->timeOut(10000)->closebutton() ->addSuccess('Lubrication Updated Sucessfully');

        return redirect('/view_lubrication');
    }

    public function view_clutch()
    {
        $data = ClutchType::all();

        return view('admin.clutch', compact('data'));
    }

    public function add_clutch(Request $request)
    {

        $ClutchType = new ClutchType();

        $ClutchType-> type = $request-> ClutchType;

        $ClutchType->save();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Clutch Added Sucessfully');

        return redirect()->back();

    }

    public function delete_clutch($id)
    {
        $ClutchType = ClutchType::find($id);

        $ClutchType -> delete();

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Clutch Deleted Sucessfully');

        return redirect()-> back();
    }

    public function edit_clutch($id)
    {
        $data = ClutchType::find($id);

        return view('admin.edit_clutch',compact('data'));
    }

    public function update_clutch(Request $request,$id)
    {
        $data = ClutchType::find($id);
        
        $data->type = $request-> ClutchType; 

        $data->save();
        
        toastr()->timeOut(10000)->closebutton() ->addSuccess('Clutch Updated Sucessfully');

        return redirect('/view_clutch');
    }

    public function view_ignition()
{
    $data = IgnitionSystem::all();

    return view('admin.ignition', compact('data'));
}

public function add_ignition(Request $request)
{
    $IgnitionSystem = new IgnitionSystem();

    $IgnitionSystem->system = $request->IgnitionSystem;

    $IgnitionSystem->save();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Ignition System Added Successfully');

    return redirect()->back();
}

public function delete_ignition($id)
{
    $IgnitionSystem = IgnitionSystem::find($id);

    $IgnitionSystem->delete();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Ignition System Deleted Successfully');

    return redirect()->back();
}

public function edit_ignition($id)
{
    $data = IgnitionSystem::find($id);

    return view('admin.edit_ignition', compact('data'));
}

public function update_ignition(Request $request, $id)
{
    $data = IgnitionSystem::find($id);
    
    $data->system = $request->IgnitionSystem; 

    $data->save();
    
    toastr()->timeOut(10000)->closebutton()->addSuccess('Ignition System Updated Successfully');

    return redirect('/view_ignition');
}

public function view_starting()
{
    $data = StartingSystem::all();

    return view('admin.starting', compact('data'));
}

public function add_starting(Request $request)
{
    $StartingSystem = new StartingSystem();

    $StartingSystem->system = $request->StartingSystem;

    $StartingSystem->save();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Starting System Added Successfully');

    return redirect()->back();
}

public function delete_starting($id)
{
    $StartingSystem = StartingSystem::find($id);

    $StartingSystem->delete();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Starting System Deleted Successfully');

    return redirect()->back();
}

public function edit_starting($id)
{
    $data = StartingSystem::find($id);

    return view('admin.edit_starting', compact('data'));
}

public function update_starting(Request $request, $id)
{
    $data = StartingSystem::find($id);
    
    $data->system = $request->StartingSystem; 

    $data->save();
    
    toastr()->timeOut(10000)->closebutton()->addSuccess('Starting System Updated Successfully');

    return redirect('/view_starting');
}

public function view_transmission()
{
    $data = TransmissionSystem::all();

    return view('admin.transmission', compact('data'));
}

public function add_transmission(Request $request)
{
    $TransmissionSystem = new TransmissionSystem();

    $TransmissionSystem->type = $request->TransmissionSystem;

    $TransmissionSystem->save();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Transmission System Added Successfully');

    return redirect()->back();
}

public function delete_transmission($id)
{
    $TransmissionSystem = TransmissionSystem::find($id);

    $TransmissionSystem->delete();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Transmission System Deleted Successfully');

    return redirect()->back();
}

public function edit_transmission($id)
{
    $data = TransmissionSystem::find($id);

    return view('admin.edit_transmission', compact('data'));
}

public function update_transmission(Request $request, $id)
{
    $data = TransmissionSystem::find($id);
    
    $data->type = $request->TransmissionSystem; 

    $data->save();
    
    toastr()->timeOut(10000)->closebutton()->addSuccess('Transmission System Updated Successfully');

    return redirect('/view_transmission');
}

public function view_suspensions()
{
    $data = Suspension::all();

    return view('admin.suspensions', compact('data'));
}

public function add_suspensions(Request $request)
{
    $suspension = new Suspension();

    $suspension->type = $request->suspension;

    $suspension->save();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Suspension Added Successfully');

    return redirect()->back();
}

public function delete_suspensions($id)
{
    $suspension = Suspension::find($id);

    $suspension->delete();

    toastr()->timeOut(10000)->closebutton()->addSuccess('Suspension Deleted Successfully');

    return redirect()->back();
}

public function edit_suspensions($id)
{
    $data = Suspension::find($id);

    return view('admin.edit_suspensions', compact('data'));
}

public function update_suspensions(Request $request, $id)
{
    $data = Suspension::find($id);
    
    $data->type = $request->suspension; 

    $data->save();
    
    toastr()->timeOut(10000)->closebutton()->addSuccess('Suspension Updated Successfully');

    return redirect('/view_suspensions');
}

    /**
     * Exibe o formulário para adicionar uma moto.
     */
    public function add_motorcycle()
    {
        $categories = Category::all();

        $brands = Brand::all();
        
        $license_types = LicenseType::all();
        
        $engine_types = EngineType::all();
        
        $lubrication_systems = LubricationSystem::all();
        
        $clutch_types = ClutchType::all();
        
        $ignition_systems = IgnitionSystem::all();
        
        $starting_systems = StartingSystem::all();
        
        $transmission_systems = TransmissionSystem::all();
        
        $suspensions = Suspension::all();

        return view('admin.add_motorcycle', compact(
            'categories', 
            
            'brands', 
            
            
            'license_types', 
            
            'engine_types', 
            
            'lubrication_systems',
            
            'clutch_types', 
            
            'ignition_systems', 
            
            'starting_systems', 
            
            'transmission_systems', 
            
            'suspensions'
        ));
    }

    /**
     * Processa e armazena uma nova moto e suas fotos.
     */
    public function upload_motorcycle(Request $request)
    {
        // Validação dos campos
        $validator = Validator::make($request->all(), [
            
            'name' => 'required|string|max:50',
            
            'description' => 'required|string|max:255',
            
            'quantity' => 'required|integer',
            
            'category_id' => 'required',
            
            'brand_id' => 'required',
            
            'price' => 'required|numeric',
            
            'license_type_id' => 'required',
            
            'engine_type_id' => 'required',
            
            'displacement' => 'required|string|max:50',
            
            'bore_stroke' => 'required|string|max:50',
            
            'compression_ratio' => 'required|numeric',
            
            'max_power' => 'required|numeric',
            
            'max_torque' => 'required|numeric',
            
            'lubrication_system_id' => 'required',
            
            'clutch_type_id' => 'required',
            
            'ignition_system_id' => 'required',
            
            'starting_system_id' => 'required',
            
            'transmission_system_id' => 'required',
            
            'final_drive' => 'required|string|max:50',
            
            'fuel_consumption' => 'required|numeric',
            
            'cos2_emissions' => 'required|numeric',
            
            'fuel_system' => 'required|string|max:50',
            
            'frame' => 'required|string|max:50',
            
            'rake_angle' => 'required|numeric',
            
            'trail' => 'required|string|max:50',
            
            'front_suspension_id' => 'required',
            
            'rear_suspension_id' => 'required',
            
            'front_travel' => 'required|numeric',
            
            'rear_travel' => 'required|numeric',
            
            'front_brake' => 'required|string|max:50',
            
            'rear_brake' => 'required|string|max:50',
            
            'front_tire' => 'required|string|max:50',
            
            'rear_tire' => 'required|string|max:50',
            
            'total_length' => 'required|numeric',
            
            'total_width' => 'required|numeric',
            
            'total_height' => 'required|numeric',
            
            'seat_height' => 'required|numeric',
            
            'wheelbase' => 'required|numeric',
            
            'ground_clearance' => 'required|numeric',
            
            'weight' => 'required|numeric',
            
            'fuel_tank_capacity' => 'required|numeric',
            
            'oil_tank_capacity' => 'required|numeric',
            
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',

            // Validação para novos campos quando selecionado 'new'
            'new_brand' => 'required_if:brand_id,new|string|max:50',
            'new_category' => 'required_if:category_id,new|string|max:50',
            'new_license_type' => 'required_if:license_type_id,new|string|max:50',
            'new_engine_type' => 'required_if:engine_type_id,new|string|max:50',
            'new_lubrication_system' => 'required_if:lubrication_system_id,new|string|max:50',
            'new_clutch_type' => 'required_if:clutch_type_id,new|string|max:50',
            'new_ignition_system' => 'required_if:ignition_system_id,new|string|max:50',
            'new_starting_system' => 'required_if:starting_system_id,new|string|max:50',
            'new_transmission_system' => 'required_if:transmission_system_id,new|string|max:50',
            'new_front_suspension' => 'required_if:front_suspension_id,new|string|max:50',
            'new_rear_suspension' => 'required_if:rear_suspension_id,new|string|max:50'
        ]);

        // Mensagens de validação personalizadas
        $messages = [
            'new_brand.required_if' => 'Por favor, digite o nome da nova marca.',
            'new_category.required_if' => 'Por favor, digite o nome da nova categoria.',
            'new_license_type.required_if' => 'Por favor, digite o novo tipo de licença.',
            'new_engine_type.required_if' => 'Por favor, digite o novo tipo de motor.',
            'new_lubrication_system.required_if' => 'Por favor, digite o novo sistema de lubrificação.',
            'new_clutch_type.required_if' => 'Por favor, digite o novo tipo de embreagem.',
            'new_ignition_system.required_if' => 'Por favor, digite o novo sistema de ignição.',
            'new_starting_system.required_if' => 'Por favor, digite o novo sistema de partida.',
            'new_transmission_system.required_if' => 'Por favor, digite o novo sistema de transmissão.',
            'new_front_suspension.required_if' => 'Por favor, digite o novo tipo de suspensão dianteira.',
            'new_rear_suspension.required_if' => 'Por favor, digite o novo tipo de suspensão traseira.'
        ];

        $validator = Validator::make($request->all(), $validator->getRules(), $messages);
        
        if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verificar e criar novos registros nas tabelas relacionadas se necessário
        $requestData = $request->all();

        // Verificar e criar nova marca
        if ($request->brand_id === 'new' && $request->filled('new_brand')) {
            $brand = Brand::create(['brand_name' => $request->new_brand]);
            $requestData['brand_id'] = $brand->id;
        }

        // Verificar e criar nova categoria
        if ($request->category_id === 'new' && $request->filled('new_category')) {
            $category = Category::create(['category_name' => $request->new_category]);
            $requestData['category_id'] = $category->id;
        }

        // Verificar e criar novo tipo de licença
        if ($request->license_type_id === 'new' && $request->filled('new_license_type')) {
            $licenseType = LicenseType::create(['type' => $request->new_license_type]);
            $requestData['license_type_id'] = $licenseType->id;
        }

        // Verificar e criar novo tipo de motor
        if ($request->engine_type_id === 'new' && $request->filled('new_engine_type')) {
            $engineType = EngineType::create(['type' => $request->new_engine_type]);
            $requestData['engine_type_id'] = $engineType->id;
        }

        // Verificar e criar novo sistema de lubrificação
        if ($request->lubrication_system_id === 'new' && $request->filled('new_lubrication_system')) {
            $lubricationSystem = LubricationSystem::create(['system' => $request->new_lubrication_system]);
            $requestData['lubrication_system_id'] = $lubricationSystem->id;
        }

        // Verificar e criar novo tipo de embreagem
        if ($request->clutch_type_id === 'new' && $request->filled('new_clutch_type')) {
            $clutchType = ClutchType::create(['type' => $request->new_clutch_type]);
            $requestData['clutch_type_id'] = $clutchType->id;
        }

        // Verificar e criar novo sistema de ignição
        if ($request->ignition_system_id === 'new' && $request->filled('new_ignition_system')) {
            $ignitionSystem = IgnitionSystem::create(['system' => $request->new_ignition_system]);
            $requestData['ignition_system_id'] = $ignitionSystem->id;
        }

        // Verificar e criar novo sistema de partida
        if ($request->starting_system_id === 'new' && $request->filled('new_starting_system')) {
            $startingSystem = StartingSystem::create(['system' => $request->new_starting_system]);
            $requestData['starting_system_id'] = $startingSystem->id;
        }

        // Verificar e criar novo sistema de transmissão
        if ($request->transmission_system_id === 'new' && $request->filled('new_transmission_system')) {
            $transmissionSystem = TransmissionSystem::create(['system' => $request->new_transmission_system]);
            $requestData['transmission_system_id'] = $transmissionSystem->id;
        }

        // Verificar e criar nova suspensão dianteira
        if ($request->front_suspension_id === 'new' && $request->filled('new_front_suspension')) {
            $frontSuspension = Suspension::create(['type' => $request->new_front_suspension]);
            $requestData['front_suspension_id'] = $frontSuspension->id;
        }

        // Verificar e criar nova suspensão traseira
        if ($request->rear_suspension_id === 'new' && $request->filled('new_rear_suspension')) {
            $rearSuspension = Suspension::create(['type' => $request->new_rear_suspension]);
            $requestData['rear_suspension_id'] = $rearSuspension->id;
        }

        // Criar a moto no banco, filtrando apenas os campos que existem na tabela
        $motorcycle = Motorcycle::create(collect($requestData)->only([
            'name', 
            'description', 
            'quantity', 
            'category_id', 
            'brand_id', 
            'price', 
            'license_type_id', 
            'engine_type_id', 
            'displacement', 
            'bore_stroke', 
            'compression_ratio',  
            'max_power', 
            'max_torque', 
            'lubrication_system_id', 
            'clutch_type_id', 
            'ignition_system_id', 
            'starting_system_id', 
            'transmission_system_id', 
            'final_drive', 
            'fuel_consumption',  
            'cos2_emissions', 
            'fuel_system', 
            'frame', 
            'rake_angle', 
            'trail', 
            'front_suspension_id',   
            'rear_suspension_id', 
            'front_travel', 
            'rear_travel', 
            'front_brake', 
            'rear_brake',
            'front_tire', 
            'rear_tire', 
            'total_length', 
            'total_width', 
            'total_height',
            'seat_height', 
            'wheelbase', 
            'ground_clearance', 
            'weight', 
            'fuel_tank_capacity',
           
            'oil_tank_capacity'
        ])->toArray());

        // Upload das fotos
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('motorcycles'), $imagename);

                    // Crie a entrada para a foto
                    Photo::create([
                        'motorcycle_id' => $motorcycle->id,
                        'image' => $imagename
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Uma das imagens não é válida.')->withInput();
                }
            }
        }

        toastr()->timeOut(10000)->closebutton() ->addSuccess('Motorcycle Added Sucessfully');

        return redirect()->back();
    }


    /**
     * Exibe a lista de motos.
     */
    public function view_motorcycle()
{
    $motorcycles = Motorcycle::with([
        'category', 'brand', 'licenseType', 'engineType', 
        'lubricationSystem', 'clutchType', 'ignitionSystem', 
        'startingSystem', 'transmissionSystem', 'frontSuspension', 'rearSuspension', 'photos'
    ])->get();

    return view('admin.view_motorcycle', compact('motorcycles'));
}

    /**
     * Exclui uma moto e suas imagens associadas.
     */
    public function delete_motorcycle($id)
    {
        $motorcycle = Motorcycle::find($id);

        if (!$motorcycle) {
            
            toastr()->timeOut(10000)->closeButton()->addError('Motorcycle Not Found');
            
            return redirect()->back();
        }

        // Excluir imagens associadas
        $photos = Photo::where('motorcycle_id', $id)->get();
        
        foreach ($photos as $photo) {
        
            $image_path = public_path('motorcycles/' . $photo->image);
        
            if (File::exists($image_path)) {
        
                File::delete($image_path);
            }
        
            $photo->delete();
        
        }

        // Excluir a moto
        $motorcycle->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Motorcycle Deleted Successfully');

        return redirect()->back();
    }

    /**
     * Exibe o formulário de edição da moto.
     */
    public function update_motorcycle($id)
    {
    
        $motorcycle = Motorcycle::find($id);
    
        $categories = Category::all();
    
        $brands = Brand::all();
    
        $license_types = LicenseType::all();
    
        $engine_types = EngineType::all();
    
        $lubrication_systems = LubricationSystem::all();
    
        $clutch_types = ClutchType::all();
    
        $ignition_systems = IgnitionSystem::all();
    
        $starting_systems = StartingSystem::all();
    
        $transmission_systems = TransmissionSystem::all();
    
        $suspensions = Suspension::all();
    
        $photos = Photo::where('motorcycle_id', $id)->get();

        if (!$motorcycle) {
    
            toastr()->timeOut(10000)->closeButton()->addError('Motorcycle Not Found');
        
            return redirect()->back();
        
        }

        
        return view('admin.update_motorcycle', compact(
        
            'motorcycle', 
            
            'categories', 
            
            'brands',
            
            'license_types', 
            
            'engine_types', 
            
            'lubrication_systems', 
            
            'clutch_types', 
        
            'ignition_systems', 
            
            'starting_systems', 
            
            'transmission_systems', 
        
            'suspensions', 'photos'
        
        ));
    
    }

    /**
     * Atualiza uma moto e suas fotos.
     */
    public function edit_motorcycle(Request $request, $id)
    {
        // Encontra a moto pelo ID
        $motorcycle = Motorcycle::find($id);

        if (!$motorcycle) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Motocicleta não encontrada.']);
            }
            toastr()->timeOut(10000)->closeButton()->addError('Motorcycle Not Found');
            return redirect()->back();
        }

        // Atualização dos dados da moto
        $motorcycle->update($request->except('_token', 'photos'));

        // Upload de novas fotos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                // Gera um nome único para a imagem
                $imagename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();

                // Move a imagem para a pasta pública
                $photo->move(public_path('motorcycles'), $imagename);

                // Salva a imagem no banco de dados
                Photo::create([
                    'motorcycle_id' => $motorcycle->id, // Associa a foto à moto correta
                    'image' => $imagename,
                ]);
            }
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Motocicleta atualizada com sucesso.']);
        }

        toastr()->timeOut(10000)->closeButton()->addSuccess('Motorcycle Updated Successfully');
        return redirect('/view_motorcycle');
    }


public function delete_photo($id)
{
    $photo = Photo::find($id);

    if (!$photo) {
        return response()->json(['success' => false, 'message' => 'Foto não encontrada.']);
    }

    // Remove o arquivo da pasta
    $imagePath = public_path('motorcycles/' . $photo->image);
    if (file_exists($imagePath)) {
        unlink($imagePath); // Remove o arquivo da pasta
    }

    // Remove o registro do banco de dados
    $photo->delete();

    return response()->json(['success' => true, 'message' => 'Foto apagada com sucesso.']);
}

    /**
     * Busca motos pelo nome ou categoria.
     */
    
     public function motorcycle_search(Request $request)
    
     {
    
        $search = $request->search;


        
        $motorcycles = Motorcycle::with(['category', 'brand', 'photos'])
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhereHas('category', function($query) use ($search) {
                $query->where('category_name', 'LIKE', '%' . $search . '%');
            })
            ->paginate(3);


        
        return view('admin.view_motorcycle', compact('motorcycles'));
    }

    public function update_all_status($order_number, $status)
    {
        if (!in_array($status, ['in progress', 'On the way', 'Delivered'])) {
            return redirect()->back();
        }
        
        Order::where('order_number', $order_number)->update(['status' => $status]);
        
        $statusText = [
            'in progress' => 'Em Processamento',
            'On the way' => 'Em Trânsito',
            'Delivered' => 'Entregue'
        ];
        
        toastr()->timeOut(10000)->closebutton()->addSuccess('Todos os itens do pedido #' . $order_number . ' foram atualizados para ' . ($statusText[$status] ?? $status));
        
        return redirect()->back();
    }

}     