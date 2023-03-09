<?php

namespace App\Providers;

use Illuminate\Http\Client\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Response::macro('Display',function ($data){
            return response()->json([
                'status'=>true,
                'data'=>$data
            ]);
        });
        Response::macro('success',function ($state,$message){
            return response()->json([
                'status'=>$state,
                'message'=>$message
            ]);
        });
        Response::macro('error',function ($errors){
            return response()->json([
                'status'=>false,
                'message'=>'خطای اعتبارسنجی',
                'errors'=>$errors
            ],422);
        });
        Response::macro('SetToken',function ($message,$token){
            return response()->json([
                'status'=>true,
                'message'=>$message,
                'Token_Access'=>$token
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
