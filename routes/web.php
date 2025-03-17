<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

      /////////////////////////////
     // Rotas da Página Inicial //
    /////////////////////////////

Route::get('/', [HomeController::class, 'home']);

Route::get('/find-store', [HomeController::class, 'findStore'])
    ->name('find.store');

Route::get('/motorcycle-catalog', [HomeController::class, 'motorcycleCatalog'])
    ->name('motorcycle.catalog');

Route::get('/product-catalog', [HomeController::class, 'productCatalog'])
    ->name('product.catalog');

      ///////////////////////////////////////
     // Rotas de Autenticação e DashBoard //
    ///////////////////////////////////////

Route::get('/dashboard', [HomeController::class, 'login_home'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/orders', [HomeController::class, 'myorders'])
    ->middleware(['auth', 'verified'])
    ->name('orders');

Route::get('/loyalty-points', [HomeController::class, 'loyalty_points'])
    ->middleware(['auth', 'verified'])
    ->name('loyalty.points');

Route::get('/wishlist', [HomeController::class, 'mywishlist'])
    ->middleware(['auth', 'verified'])
    ->name('wishlist');

Route::get('/add-to-wishlist/{id}', [HomeController::class, 'add_to_wishlist'])
    ->middleware(['auth', 'verified'])
    ->name('add.to.wishlist');

Route::get('/add-motorcycle-to-wishlist/{id}', [HomeController::class, 'add_motorcycle_to_wishlist'])
    ->middleware(['auth', 'verified'])
    ->name('add.motorcycle.to.wishlist');

Route::get('/delete-wishlist-item/{id}', [HomeController::class, 'delete_wishlist_item'])
    ->middleware(['auth', 'verified'])
    ->name('delete.wishlist.item');

Route::get('/move-to-cart/{id}', [HomeController::class, 'move_to_cart'])
    ->middleware(['auth', 'verified'])
    ->name('move.to.cart');

Route::post('/update_quantity', [HomeController::class, 'update_quantity'])
    ->middleware(['auth', 'verified']);

      /////////////////////
     // Rotas de Perfil //
    /////////////////////

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

      ////////////////////
     // Rotas de Admin //
    ////////////////////

Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin']); 

      /////////////////////////
     // Rotas de Categorias //
    /////////////////////////

Route::get('view_category', [AdminController::class, 'view_category'])
    ->middleware(['auth', 'admin']);

Route::post('add_category', [AdminController::class, 'add_category'])
    ->middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])
    ->middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])
    ->middleware(['auth', 'admin']);

Route::post('update_category/{id}', [AdminController::class, 'update_category'])
    ->middleware(['auth', 'admin']);

      ///////////////////////
     // Rotas de Produtos //
    ///////////////////////

Route::get('add_product', [AdminController::class, 'add_product'])
    ->middleware(['auth', 'admin']);

Route::post('upload_product', [AdminController::class, 'upload_product'])
    ->middleware(['auth', 'admin']);

Route::get('view_product', [AdminController::class, 'view_product'])
    ->middleware(['auth', 'admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])
    ->middleware(['auth', 'admin']);

Route::get('update_product/{id}', [AdminController::class, 'update_product'])
    ->middleware(['auth', 'admin']);

Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])
    ->middleware(['auth', 'admin']);

Route::get('product_search', [AdminController::class, 'product_search'])
    ->middleware(['auth', 'admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

      /////////////////////////////////
     // Rotas do Carinho de compras //
    /////////////////////////////////

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])
    ->middleware(['auth', 'verified']);

Route::post('add_cart_with_size/{id}', [HomeController::class, 'add_cart_with_size'])
    ->middleware(['auth', 'verified']);

Route::post('update_size', [HomeController::class, 'update_size'])
    ->middleware(['auth', 'verified']);

Route::get('mycart', [HomeController::class, 'mycart'])
    ->middleware(['auth', 'verified']);

Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])
    ->middleware(['auth', 'verified']);

      //////////////////////
     // Rotas de Pedidos //
    //////////////////////

Route::post('comfirm_order', [HomeController::class, 'comfirm_order'])
    ->middleware(['auth', 'verified']);

Route::get('view_orders', [AdminController::class, 'view_orders'])
    ->middleware(['auth', 'admin']);

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])
    ->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])
    ->middleware(['auth', 'admin']);

Route::get('update_all_status/{order_number}/{status}', [AdminController::class, 'update_all_status'])
    ->middleware(['auth', 'admin']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])
    ->middleware(['auth', 'admin']);

      ///////////////////////////////////
     // Rotas de Pagamento com Stripe //
    ///////////////////////////////////

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

      /////////////////////
     // Rotas de Marcas //
    /////////////////////

    Route::get('view_brand', [AdminController::class, 'view_brand'])
        ->middleware(['auth', 'admin']);

    Route::post('add_brand', [AdminController::class, 'add_brand'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_brand/{id}', [AdminController::class, 'delete_brand'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_brand/{id}', [AdminController::class, 'edit_brand'])
        ->middleware(['auth', 'admin']);

    Route::post('update_brand/{id}', [AdminController::class, 'update_brand'])
        ->middleware(['auth', 'admin']);

      ////////////////////
     // Rotas do Motor //
    ////////////////////

    Route::get('view_engine', [AdminController::class, 'view_engine'])
        ->middleware(['auth', 'admin']);

    Route::post('add_engine', [AdminController::class, 'add_engine'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_engine/{id}', [AdminController::class, 'delete_engine'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_engine/{id}', [AdminController::class, 'edit_engine'])
        ->middleware(['auth', 'admin']);

    Route::post('update_engine/{id}', [AdminController::class, 'update_engine'])
        ->middleware(['auth', 'admin']);

      ///////////////////////////
     // Rotas da Lubrificação //
    ///////////////////////////

    Route::get('view_lubrication', [AdminController::class, 'view_lubrication'])
        ->middleware(['auth', 'admin']);

    Route::post('add_lubrication', [AdminController::class, 'add_lubrication'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_lubrication/{id}', [AdminController::class, 'delete_lubrication'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_lubrication/{id}', [AdminController::class, 'edit_lubrication'])
        ->middleware(['auth', 'admin']);

    Route::post('update_lubrication/{id}', [AdminController::class, 'update_lubrication'])
        ->middleware(['auth', 'admin']);

      ////////////////////////
     // Rotas de embreagem //
    ////////////////////////

    Route::get('view_clutch', [AdminController::class, 'view_clutch'])
        ->middleware(['auth', 'admin']);

    Route::post('add_clutch', [AdminController::class, 'add_clutch'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_clutch/{id}', [AdminController::class, 'delete_clutch'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_clutch/{id}', [AdminController::class, 'edit_clutch'])
        ->middleware(['auth', 'admin']);

    Route::post('update_clutch/{id}', [AdminController::class, 'update_clutch'])
        ->middleware(['auth', 'admin']);

      //////////////////////
     // Rotas de ignição //
    //////////////////////

    Route::get('view_ignition', [AdminController::class, 'view_ignition'])
        ->middleware(['auth', 'admin']);

    Route::post('add_ignition', [AdminController::class, 'add_ignition'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_ignition/{id}', [AdminController::class, 'delete_ignition'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_ignition/{id}', [AdminController::class, 'edit_ignition'])
        ->middleware(['auth', 'admin']);

    Route::post('update_ignition/{id}', [AdminController::class, 'update_ignition'])
        ->middleware(['auth', 'admin']);
        
      ///////////////////////
     // Rotas de arranque //
    ///////////////////////

    Route::get('view_starting', [AdminController::class, 'view_starting'])
        ->middleware(['auth', 'admin']);

    Route::post('add_starting', [AdminController::class, 'add_starting'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_starting/{id}', [AdminController::class, 'delete_starting'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_starting/{id}', [AdminController::class, 'edit_starting'])
        ->middleware(['auth', 'admin']);

    Route::post('update_starting/{id}', [AdminController::class, 'update_starting'])
        ->middleware(['auth', 'admin']);

      //////////////////////////
     // Rotas de Transmissão //
    //////////////////////////

    Route::get('view_transmission', [AdminController::class, 'view_transmission'])
        ->middleware(['auth', 'admin']);

    Route::post('add_transmission', [AdminController::class, 'add_transmission'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_transmission/{id}', [AdminController::class, 'delete_transmission'])
        ->middleware(['auth', 'admin']);

    Route::get('edit_transmission/{id}', [AdminController::class, 'edit_transmission'])
        ->middleware(['auth', 'admin']);

    Route::post('update_transmission/{id}', [AdminController::class, 'update_transmission'])
        ->middleware(['auth', 'admin']);

      ////////////////////////
     // Rotas de suspensão //
    ////////////////////////

    Route::get('view_suspensions', [AdminController::class, 'view_suspensions'])
    ->middleware(['auth', 'admin']);

Route::post('add_suspensions', [AdminController::class, 'add_suspensions'])
    ->middleware(['auth', 'admin']);

Route::get('delete_suspensions/{id}', [AdminController::class, 'delete_suspensions'])
    ->middleware(['auth', 'admin']);

Route::get('edit_suspensions/{id}', [AdminController::class, 'edit_suspensions'])
    ->middleware(['auth', 'admin']);

Route::post('update_suspensions/{id}', [AdminController::class, 'update_suspensions'])
    ->middleware(['auth', 'admin']);


      ////////////////////
     // Rotas de Motos //
    ////////////////////

    Route::get('add_motorcycle', [AdminController::class, 'add_motorcycle'])
        ->middleware(['auth', 'admin']);

    Route::post('upload_motorcycle', [AdminController::class, 'upload_motorcycle'])
        ->middleware(['auth', 'admin']);

    Route::get('view_motorcycle', [AdminController::class, 'view_motorcycle'])
        ->middleware(['auth', 'admin']);

    Route::get('delete_motorcycle/{id}', [AdminController::class, 'delete_motorcycle'])
        ->middleware(['auth', 'admin']);

    Route::get('update_motorcycle/{id}', [AdminController::class, 'update_motorcycle'])
        ->middleware(['auth', 'admin']);

    Route::post('edit_motorcycle/{id}', [AdminController::class, 'edit_motorcycle'])
        ->middleware(['auth', 'admin'])
        ->name('update_motorcycle'); // Adicione o nome da rota

    Route::get('motorcycle_search', [AdminController::class, 'motorcycle_search'])
        ->middleware(['auth', 'admin']);

    Route::delete('delete_photo/{id}', [AdminController::class, 'delete_photo'])
        ->middleware(['auth', 'admin'])
        ->name('delete_photo');

    Route::get('motorcycle_details/{id}', [HomeController::class, 'motorcycle_details']);
});
