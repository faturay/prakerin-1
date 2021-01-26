<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test',function(){
    return view('layouts.master');
});

//admin routr
Route::group(['prefix' => 'admin', 'middleware'=>['auth']],function () {
   Route::get('/',function()
   {
   return view('admin.index');
});

Route::get('provinsi',function()
{
    return view('admin.provinsi.index');  
     }); 

Route::resource('provinsi',ProvinsiController::class); 
Route::resource('kota',KotaController::class);
Route::resource('kecamatan',KecamatanController::class);
});