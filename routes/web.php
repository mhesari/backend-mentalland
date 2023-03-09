<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/users_register', [App\Http\Controllers\HomeController::class, 'users_register'])->name('regi');

Route::group(['prefix'=>'admin','namespace'=>"App\Http\Controllers\administrator" , 'middleware'=>'auth'],function (){

    Route::get('dashboard','homeController@panel');
    Route::get('setting_list','homeController@setting_list');
    Route::get('setting_edit/{id}','homeController@setting_edit');
    Route::get('social_media_list','homeController@social_media_list');
    Route::get('social_media_edit/{id}','homeController@social_media_edit');
    Route::get('profile_admin','homeController@profile_admin');
    Route::get('profile_const','homeController@profile_const');
    Route::get('profile_empolyee','homeController@profile_empolyee');
    Route::get('profile_user','homeController@profile_user');
    Route::get('users_list','homeController@users_list');
    Route::get('admin_list','homeController@admin_list');
    Route::get('employer_list','homeController@employer_list');
    Route::get('consts_list','homeController@consts_list');
    Route::get('users_create','homeController@users_create');
    Route::get('contact-us','homeController@contactus');
    Route::get('faq_create','homeController@faq_create');
    Route::get('faq_list','homeController@faq_list');
    Route::get('adversting-create','homeController@adversting_create');
    Route::get('adversting-list','homeController@adversting_list');
    Route::get('adversting-edit/{id}','homeController@adversting_edit');
    Route::get('adversting-admin-list','homeController@adversting_admin_list');
    Route::get('single-adversting-admin-list/{id}','homeController@single_adversting_admin_list');
    Route::get('event-create','homeController@event_create');
    Route::get('event-list','homeController@event_list');
    Route::get('event-edit/{id}','homeController@event_edit');
    Route::get('set-const-create','homeController@set_const_create');
    Route::get('set-const-list','homeController@set_const_list');
    Route::get('category-blog-create','homeController@category_blog_create');
    Route::get('category-blog-list','homeController@category_blog_list');
    Route::get('category-blog-edit/{id}','homeController@category_blog_edit');
    Route::get('blogs-create','homeController@blogs_create');
    Route::get('blogs-list','homeController@blogs_list');
    Route::get('blogs-edit/{id}','homeController@blogs_edit');
    Route::get('category-const-create','homeController@category_const_create');
    Route::get('category-const-list','homeController@category_const_list');
    Route::get('subcategory-const-create','homeController@subcategory_const_create');
    Route::get('subcategory-const-list/{id}','homeController@aubcategory_const_list');
    Route::get('set-price-const','homeController@set_price_const');

});

//Teimory Codes

//Route::get('message' , [App\Http\Controllers\mainC::class, 'index_m']);
//Route::post('/create_messages' , [App\Http\Controllers\mainC::class, 'create_messages'])->name('create_m');
//Route::get('file/s/shows' , 'FileC@sh')->name('sh');
Route::get('buy',function(){
    return view('shop');
});

Route::get('order','siteController@order');
Route::post('shop','siteController@add_order');
