<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admincontroller;



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


Route::any('/', function () {
    return view('login');
});

Route::any("register",[Admincontroller::class,'register']);

Route::any("login",[Admincontroller::class,'login']);

Route::any("user",[Admincontroller::class,'user']);

Route::any("home",[Admincontroller::class,'home']);

Route::any("deposit",[Admincontroller::class,'deposit']);

Route::any("withdraw",[Admincontroller::class,'withdraw']);

Route::any("transfer",[Admincontroller::class,'transfer']);

Route::any("statement",[Admincontroller::class,'statement']);

Route::any("submitregistration",[Admincontroller::class,'submitregistration']);

Route::any("submitdeposit",[Admincontroller::class,'submitdeposit']);

Route::any("submitwithdrawal",[Admincontroller::class,'submitwithdrawal']);
