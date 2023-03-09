<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Ebrahimi Codes

Route::group(['prefix'=>'V1','namespace'=>'App\Http\Controllers\Api'],function (){

    Route::group(['prefix'=>'auth'],function (){
        Route::post('login','homeController@login');
        Route::post('logout','homeController@logout')->middleware('auth:sanctum');
        Route::post('employer_register','homeController@employer_register');
        Route::post('users_register','homeController@users_register');
    });

    Route::group(['prefix'=>'homepage'],function (){
        Route::post('contactus','homeController@contactus');

    });


    Route::group(['prefix'=>'admin','middleware'=>'auth:sanctum'],function (){
        Route::put('admin_profile','homeController@admin_profile');
        Route::get('setting_list','homeController@setting_list');
        Route::put('setting_update/{id}','homeController@setting_update');
        Route::get('social_media_list','homeController@social_media_list');
        Route::put('social_media_update/{id}','homeController@social_media_update');
        Route::get('adversting_list_admin','homeController@adversting_list_admin');
        Route::patch('adversting_check_admin/{id}','homeController@adversting_check_admin');
        Route::delete('adversting_delete_admin/{id}','homeController@adversting_delete_admin');
        Route::post('blogs_create','homeController@blogs_create');
        Route::get('blogs_list','homeController@blogs_list');
        Route::put('blogs_update/{id}','homeController@blogs_update');
        Route::delete('blogs_delete/{id}','homeController@blogs_delete');
        Route::post('faqs_create','homeController@faqs_create');
        Route::get('faqs_list','homeController@faqs_list');
        Route::delete('faqs_delete/{id}','homeController@faqs_delete');
        Route::get('contactus_list','homeController@contactus_list');
        Route::delete('contactus_delete/{id}','homeController@contactus_delete');
        Route::get('users_admin_list','homeController@users_admin_list');
        Route::get('admin_list','homeController@admin_list');
        Route::get('employer_list','homeController@employer_list');
        Route::get('consts_list','homeController@consts_list');
        Route::post('users_save','homeController@users_save');
        Route::delete('users_delete/{user_id}','homeController@users_delete');
        Route::post('events_create','homeController@events_create');
        Route::get('events_list','homeController@events_list');
        Route::delete('events_delete/{id}','homeController@events_delete');
        Route::put('events_update/{id}','homeController@events_update');
        Route::post('category_blog_save','homeController@category_blog_save');
        Route::get('category_blog_list','homeController@category_blog_list');
        Route::put('category_blog_update/{id}','homeController@category_blog_update');
        Route::delete('category_blog_delete/{id}','homeController@category_blog_delete');
        Route::post('category_consts_create','homeController@category_consts_create');
        Route::get('category_consts_list','homeController@category_consts_list');
        Route::delete('category_consts_delete/{id}','homeController@category_consts_delete');
        Route::post('subcategory_consts_create','homeController@subcategory_consts_create');
        Route::get('subcategory_consts_list/{id}','homeController@subcategory_consts_list');
        Route::delete('subcategory_consts_delete/{id}','homeController@subcategory_consts_delete');

    });

    Route::group(['prefix'=>'employer','middleware'=>'auth:sanctum'],function (){
       Route::put('employer_profile','homeController@employer_profile');
       Route::post('adversting_save','homeController@adversting_save');
       Route::get('adversting_list','homeController@adversting_list');
       Route::put('adversting_update/{id}','homeController@adversting_update');
       Route::patch('adversting_close/{id}','homeController@adversting_close');
       Route::get('city/{id}','homeController@city');
    });

    Route::group(['prefix'=>'user','middleware'=>'auth:sanctum'],function (){
       Route::put('user_profile','homeController@user_profile');
       Route::post('work_experence_user_create','homeController@work_experence_user_create');
       Route::get('work_experence_user_list','homeController@work_experence_user_list');
       Route::delete('work_experence_user_delete/{id}','homeController@work_experence_user_delete');
       Route::post('educational_record_create','homeController@educational_record_create');
       Route::get('educational_record_list','homeController@educational_record_list');
       Route::delete('educational_record_delete/{id}','homeController@educational_record_delete');
    });

    Route::group(['prefix'=>'const','middleware'=>'auth:sanctum'],function (){
        Route::put('const_profile','homeController@const_profile');
        Route::post('set_date_time','homeController@set_date_time');
        Route::get('set_date_time_list','homeController@set_date_time_list');
        Route::delete('set_date_time_delete/{id}','homeController@set_date_time_delete');
        Route::get('get_subcategory_value/{id}','homeController@get_subcategory_value');
        Route::post('save_price_const','homeController@save_price_const');
        Route::get('list_price_const','homeController@list_price_const');
        Route::delete('list_price_const_delete/{id}','homeController@list_price_const_delete');
    });
});


//Teimory Codes

Route::group(['prefix'=>'const','middleware'=>'auth:sanctum'],function (){
    Route::post('postmessage', [App\Http\Controllers\Api\homeController::class, 'postmessage']);
    Route::post('appoint', [App\Http\Controllers\Api\homeController::class, 'postappoint']);
    Route::get('getseminars', [App\Http\Controllers\Api\homeController::class, 'getseminars']);
    Route::get('getjobs', [App\Http\Controllers\Api\homeController::class, 'getjobs']);
    Route::get('getjobsby', [App\Http\Controllers\Api\homeController::class, 'getjobsby']);
    Route::post('newsletter', [App\Http\Controllers\Api\homeController::class, 'newsletter']);
    Route::get('getmusicAdults', [App\Http\Controllers\Api\homeController::class, 'getmusicAdults']);
    Route::get('getmusicChild', [App\Http\Controllers\Api\homeController::class, 'getmusicChild']);
    Route::get('getcoachAdults', [App\Http\Controllers\Api\homeController::class, 'getcoachAdults']);
    Route::get('getcoachChild', [App\Http\Controllers\Api\homeController::class, 'getcoachChild']);
    Route::get('getpsych', [App\Http\Controllers\Api\homeController::class, 'getpsych']);
    Route::post('post_applied_psych', [App\Http\Controllers\Api\homeController::class, 'post_applied_psych']);
    Route::get('gethisjobs', [App\Http\Controllers\Api\homeController::class, 'gethisjobs']);

});


