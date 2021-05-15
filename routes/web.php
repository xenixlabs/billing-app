<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('/login');
});

// Dashboard Routes
Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

// Masters Routes
Route::resource('masters', 'MasterController')->middleware('auth');

// Challan Routes
Route::post('challan/item/store','ChallanController@storeItems')->middleware('auth');
Route::post('challan/item/delete/{id}','ChallanController@deleteItems')->middleware('auth');
Route::get('challan/print/{id}','ChallanController@print')->middleware('auth');
Route::get('challan/search', 'ChallanController@search')->middleware('auth');
Route::resource('challan', 'ChallanController')->middleware('auth');


// Report Routes
Route::get('/monthly-report', 'ReportController@index')->middleware('auth');

//Reset Password
Route::get('/reset-password', function(){
    return view('resetpassword.index');
})->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
