<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');


Route::get('/', function () {
    return view('frontend.index');
});

// Route::get('/shop', function () {
//     return view('frontend.shop');
// });

Route::get('/shop','App\Http\Controllers\Frontend\ProductController@index');

// Route::get('/product_details', function () {
//     return view('frontend.product_details');
// });

Route::get('/product_details/{id}','App\Http\Controllers\Frontend\ProductController@product_details');

Route::get('/cart','App\Http\Controllers\Frontend\ProductController@view_cart');
Route::get('list_cart','App\Http\Controllers\Frontend\ProductController@list')->name('list_cart');
Route::post('update_quantity','App\Http\Controllers\Frontend\ProductController@update_quantity')->name('update_quantity');
Route::post('add_to_cart','App\Http\Controllers\Frontend\ProductController@add_to_cart')->name('add_to_cart');



Route::get('/contact_us', function () {
    return view('frontend.contact');
});



// User Auth
Route::get('/user_register', 'App\Http\Controllers\Frontend\AuthController@user_register')->name('user_register');
Route::post('/custom_register', 'App\Http\Controllers\Frontend\AuthController@custom_register')->name('custom_register');

Route::get('/user_login', 'App\Http\Controllers\Frontend\AuthController@user_login')->name('user_login');
Route::post('/custom_login', 'App\Http\Controllers\Frontend\AuthController@custom_login')->name('custom_login');

Route::get('/user_logout', 'App\Http\Controllers\Frontend\AuthController@user_logout')->name('user_logout');



Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');


Route::middleware(['2fa'])->group(function () {
    // HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});

Auth::routes();


Route::get('/update_profile',[HomeController::class,'update_profile'])->name('update_profile')->middleware('auth');
Route::any('/active2fa/{id}',[HomeController::class,'active2fa'])->name('active2fa')->middleware('auth');
Route::get('/profile','App\Http\Controllers\HomeController@profile')->middleware('auth');



Route::middleware('auth')->prefix('category')->group(function(){
    Route::get('/','App\Http\Controllers\CategoryController@index')->name('category');
    Route::get('/add','App\Http\Controllers\CategoryController@add');
    Route::get('edit/{id}','App\Http\Controllers\CategoryController@edit');
    Route::post('store_category','App\Http\Controllers\CategoryController@store')->name('store_category');
    Route::post('update_category/{id}','App\Http\Controllers\CategoryController@update')->name('update_category');
    Route::get('list_category','App\Http\Controllers\CategoryController@list')->name('list_category');
    Route::post('deletecategory','App\Http\Controllers\CategoryController@delete')->name('deletecategory');
});

Route::middleware('auth')->prefix('colors')->group(function(){
    Route::get('/','App\Http\Controllers\ColorController@index')->name('colors');
    Route::get('/add','App\Http\Controllers\ColorController@add');
    Route::get('edit/{id}','App\Http\Controllers\ColorController@edit');
    Route::post('store_color','App\Http\Controllers\ColorController@store')->name('store_color');
    Route::post('update_color/{id}','App\Http\Controllers\ColorController@update')->name('update_color');
    Route::get('list_colors','App\Http\Controllers\ColorController@list')->name('list_colors');
    Route::post('deletecolor','App\Http\Controllers\ColorController@delete')->name('deletecolor');
});

Route::middleware('auth')->prefix('product')->group(function(){
    Route::get('/','App\Http\Controllers\ProductController@index')->name('product');
    Route::get('/add','App\Http\Controllers\ProductController@add');
    Route::get('edit/{id}','App\Http\Controllers\ProductController@edit');
    Route::post('store_product','App\Http\Controllers\ProductController@store')->name('store_product');
    Route::post('update_product/{id}','App\Http\Controllers\ProductController@update')->name('update_product');
    Route::get('list_product','App\Http\Controllers\ProductController@list')->name('list_product');
    Route::post('deleteproduct','App\Http\Controllers\ProductController@delete')->name('deleteproduct');
});


Route::middleware('auth')->prefix('users')->group(function(){
    
    Route::get('/','App\Http\Controllers\UserController@index');
    Route::get('/list','App\Http\Controllers\UserController@list')->name('list_user');
    Route::get('/assigned_user_list','App\Http\Controllers\UserController@assigned_user_list')->name('assigned_user_list');
    Route::get('/add','App\Http\Controllers\UserController@add');
    Route::get('edit/{id}','App\Http\Controllers\UserController@edit');
    Route::post('store_user','App\Http\Controllers\UserController@store')->name('store_user');
    Route::any('update_user/{id}','App\Http\Controllers\UserController@update')->name('update_user');
    Route::post('userdelete','App\Http\Controllers\UserController@delete')->name('userdelete');
    
});


Route::middleware('auth')->prefix('roles-permission')->group(function(){
    Route::get('/',[RoleController::class,'index'])->name('index');
    Route::get('add',[RoleController::class,'add'])->name('add');
    Route::get('assign',[RoleController::class,'create'])->name('create');
    Route::get('assign_permission',[RoleController::class,'assign_permission'])->name('assign_permission');
    
});


Route::middleware('auth')->prefix('whatsapp')->group(function(){
    Route::get('/',[WhatsappController::class,'index'])->name('index');
    Route::get('/show_dash/{user_id}',[WhatsappController::class,'show_dash'])->name('show_dash');
    Route::post('send',[WhatsappController::class,'send'])->name('send');
});
    Route::post('/send_message',[WhatsappController::class,'send_message'])->name('send_message');

Route::middleware(['blockIP','auth'])->prefix('security')->group(function(){
    Route::get('/',[SecurityController::class,'index'])->name('index');
    Route::get('/add',[SecurityController::class,'add'])->name('add');
    Route::get('/list',[SecurityController::class,'list'])->name('security_list');
    Route::post('/store_security',[SecurityController::class,'store'])->name('store_security');
    Route::get('edit/{id}',[SecurityController::class,'edit'])->name('edit_security');
    Route::post('/update_security/{id}',[SecurityController::class,'update'])->name('update_security');
    Route::post('/delete',[SecurityController::class,'delete'])->name('deletesecurity');
    
});


Route::any('/mailtest',[SecurityController::class,'mailtest'])->name('mailtest');



Route::get('/clear-cache', function (){
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('config:cache');
   Artisan::call('optimize:clear');
   Artisan::call('view:clear');
   return "Cache is clear";
});


