<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('signup',[AuthController::class,'signUp'])->name('signUp');
Route::post('signup',[AuthController::class,'registration'])->name('registration');

Route::middleware('auth')->group(function () {
    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::controller(HomeController::class)->group(function(){
        Route::get('order/{pump_id}','oderForm')->name('oderForm');
        Route::post('order/save','saveOrder')->name('saveOrder');
        Route::get('orders/list','orderList')->name('orderList');
        Route::get('orders/cancel/{order_id}','cancelOrder')->name('cancelOrder');
    });
    
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin','index')->name('dashBoard');
        Route::get('pump','pumpList')->name('pumpList');
        Route::get('pump/add','addPump')->name('addPump');
        Route::post('pump/save','savePump')->name('savePump');
        Route::get('pump/edit/{id}','editPump')->name('editPump');
        Route::get('delivery_agent','deliveryAgents')->name('deliveryAgents');
        Route::get('delivery_agent/add','addAgent')->name('addAgent');
        Route::post('delivery_agent/save','saveAgent')->name('saveAgent');
        Route::get('delivery_agent/delete/{user_id}','deleteAgent')->name('deleteAgent');
        Route::get('config','getConfig')->name('getConfig');
        Route::post('config','saveConfig')->name('saveConfig');
    })->middleware('admin');
   
    Route::controller(AgentController::class)->group(function(){
        Route::get('agent','index')->name('agentHome');
        Route::get('agent/new/orders','newOrder')->name('newOrder');
        Route::get('agent/old/orders','oldOrder')->name('oldOrder');
        Route::get('agent/complete/order/{order_id}','completeOrder')->name('completeOrder');
        Route::get('agent/accept/order/{order_id}','acceptOrder')->name('acceptOrder');
        Route::post('agent/otp/verify','verifyOtp')->name('verifyOtp');
    });

});