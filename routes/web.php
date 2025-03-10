<?php

use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Backend\AdminOrderController;
use App\Http\Controllers\Backend\SubCategoryController;

// SslCommerzPaymentController controller
use App\Http\Controllers\Frontend\CustomerAuthController;
use App\Http\Controllers\Frontend\CustomerOrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

///*************** */ for frontend controller start ****************///

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-category/{slug}', [HomeController::class, 'category'])->name('product-category');
Route::get('/product-sub-category/{slug}', [HomeController::class, 'subCategory'])->name('product-sub-category');
Route::get('/product-brand/{slug}', [HomeController::class, 'brand'])->name('product-brand');
Route::get('/product-shop', [HomeController::class, 'shop'])->name('product-shop');
Route::get('/product-details/{id}', [HomeController::class, 'details'])->name('product-details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/search-product', [HomeController::class, 'searchProduct'])->name('search-product');

Route::get('/product-search', [HomeController::class, 'ajaxPoductSearch']);
Route::get('/search-product-price', [HomeController::class, 'ajaxSearchProductPrice'])->name('search.price');
Route::get('/sort-price', [HomeController::class, 'ajaxSortPrice'])->name('sort.price');
Route::get('/brand-filter', [HomeController::class, 'ajaxCheckBrand'])->name('brand.filter');

Route::post('/add-to-cart/{id}', [CartController::class, 'addCart'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class, 'cart'])->name('show-cart');
Route::post('/cart-update/{id}', [CartController::class, 'cartUpdate'])->name('cart-update');
Route::get('/remove-cart/{id}', [CartController::class, 'removeCart'])->name('remove-cart');
Route::get('/check-out', [CheckOutController::class, 'checkOut'])->name('check-out');
Route::post('/new-cash-order', [CheckOutController::class, 'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order', [CheckOutController::class, 'completeOrder'])->name('complete-order');

Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer.login');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');


Route::middleware(['customer'])->group(function(){
    Route::get('/customer-logout', [CustomerAuthController::class, 'customerLogout'])->name('customer.logout');

    Route::get('/customer-dashbord', [CustomerAuthController::class, 'customerDashboard'])->name('customer.dashbord');
    Route::get('/customer-profile', [CustomerAuthController::class, 'customerProfile'])->name('customer.profile');
    Route::get('/customer-order', [CustomerOrderController::class, 'customerOrder'])->name('customer.order');
});





// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Route::middleware('auth')->group(function(){
//     Route::get('cart-page', [CartController::class, 'cartPage'])->name('cart.page');
//     Route::get('delete-item/{id}', [CartController::class, 'cartDelete'])->name('deleteItem');
//     Route::post('add/to-cart/{id}', [CartController::class, 'addToCart'])->name('add/to-cart');
// });

///*************** */ for frontend controller end ****************///

  // middleware
  Route::group( ['prefix' => 'admin','middleware' => ['auth', 'admin'], 'as'=> 'admin.'], function(){

    // for backend
    // Route::get('/dashboard', [BackendController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [BackendController::class, 'OrderCount'])->name('dashboard');
    // Route::get('/dashboard', [BackendController::class, 'totalCustomer'])->name('dashboard');

    Route::controller(BackendController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        
    });

    // for admin
    // Route::get('/logout', [AdminController::class, 'destroy'])->name('logout');


     // for Category Controller
     Route::controller(SliderController::class)->group(function(){
        Route::get('/slider/add', 'create')->name('slider.add');
        Route::post('/slider/submit', 'store')->name('slider.store');
        Route::get('/slider/list', 'index')->name('slider.list');
    
        Route::get('/slider/active/{id}', 'active')->name('slider.active');
        Route::get('/slider/inActive/{id}', 'inActive')->name('slider.inActive');
    
        Route::get('/slider/edit/{id}', 'edit')->name('slider.edit');
        Route::post('/slider/update/{id}', 'update')->name('slider.update');
        Route::get('/slider/delete/{id}', 'destroy')->name('slider.delete');
    });

    // for Category Controller
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category/add', 'create')->name('category.add');
        Route::post('/category/submit', 'store')->name('category.store');
        Route::get('/category/list', 'index')->name('category.list');
    
        Route::get('/category/active/{id}', 'active')->name('category.active');
        Route::get('/category/inActive/{id}', 'inActive')->name('category.inActive');
    
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::post('/category/update/{id}', 'update')->name('category.update');
        Route::get('/category/delete/{id}', 'destroy')->name('category.delete');
    });

    // for SubCategory Controller
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/subcategory/add', 'create')->name('subcategory.add');
        Route::post('/subcategory/submit', 'store')->name('subcategory.store');
        Route::get('/subcategory/list', 'index')->name('subcategory.list');

        Route::get('/subcategory/active/{id}', 'active')->name('subcategory.active');
        Route::get('/subcategory/inActive/{id}', 'inActive')->name('subcategory.inActive');

        Route::get('/subcategory/edit/{id}', 'edit')->name('subcategory.edit');
        Route::post('/subcategory/update/{id}', 'update')->name('subcategory.update');
        Route::get('/subcategory/delete/{id}', 'destroy')->name('subcategory.delete');
    });

    // for Brand Controller
    Route::controller(BrandController::class)->group(function(){
        Route::get('/brand/add', 'create')->name('brand.add');
        Route::post('/brand/submit', 'store')->name('brand.store');
        Route::get('/brand/list', 'index')->name('brand.list');

        Route::get('/brand/active/{id}', 'active')->name('brand.active');
        Route::get('/brand/inActive/{id}', 'inActive')->name('brand.inActive');

        Route::get('/brand/change-top-brand/{id}', 'changeStatus')->name('brand.topBrand');

        Route::get('/brand/edit/{id}', 'edit')->name('brand.edit');
        Route::post('/brand/update/{id}', 'update')->name('brand.update');
        Route::get('/brand/delete/{id}', 'destroy')->name('brand.delete');
    });

    // for Product Controller
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product/add', 'create')->name('product.add');
        Route::post('/product/submit', 'store')->name('product.store');
        Route::get('/product/list', 'index')->name('product.list');

        Route::get('product/active/{id}', 'active')->name('product.active');
        Route::get('product/inActive/{id}', 'inActive')->name('product.inActive');

        Route::get('/category-by-subcategory', [ProductController::class, 'categoryBySubCategory']);

        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update/{id}', 'update')->name('product.update');
        Route::get('/product/delete/{id}', 'destroy')->name('product.delete');
        Route::get('/product.details/{id}', 'details')->name('product.details');

        Route::get('/appgallery.delete/{id}', 'galleryDelete')->name('gallery.delete');
        Route::post('/gallery.update/{id}', 'galleryUpdate')->name('gallery.update');
    });

    // for order controller
    Route::controller(AdminOrderController::class)->group(function(){
        Route::get('/order/list', 'index')->name('order.list');

        Route::get('/order/view/{id}', 'view')->name('order.view');
        Route::get('/order/invoice/{id}', 'invoice')->name('order.invoice');
        Route::get('/order/print/{id}', 'print')->name('order.print');
        Route::get('/order/edit/{id}', 'edit')->name('order.edit');
        Route::post('/order/update/{id}', 'update')->name('order.update');
        Route::get('/order/delete/{id}', 'destroy')->name('order.delete');

        Route::get('/order/mail/{id}', 'mailInvoice')->name('mail.invoice');
        Route::get('/order/mailInvoice/{id}', 'sendmailInvoice')->name('mail.mailInvoice');
    });


});



  


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
