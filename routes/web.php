<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\adminlogincontroller;
use  App\Http\Controllers\productlistcontroller;
use  App\Http\Controllers\categorycontroller;
use  App\Http\Controllers\subcategorycontroller;
use  App\Http\Controllers\admincustomercontroller;
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
//     return view('adminlogin');
// });
Route::get('/dashboard', function () {
    return view('admindashboard');
});
Route::get('/dashboard',[adminlogincontroller::class,'dashboard']);

route::view('/','adminlogin');

Route::post("/",[adminlogincontroller::class,'adminlogin']);
Route::get("/logout",[adminlogincontroller::class,'adminlogout']);
Route::get("/productdetail",[productlistcontroller::class,'show_product']);
Route::get("/categorydetail",[categorycontroller::class,'show_category']);
Route::get("/subcategorydetail",[subcategorycontroller::class,'show_subcategory']);
Route::get('/admineditcategory/{cid}', function () {
    return view('/admineditcategory');
});
Route::get("admineditcategory/{cid}",[categorycontroller::class,'edit_category']);
Route::get("adminprofile",[adminlogincontroller::class,'adminviewprofile']);
Route::get("customer",[admincustomercontroller::class,'view_customer']);