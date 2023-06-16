<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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



Route::get('/',[HomeController::class, 'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/user',[AdminController::class,'users']);
Route::get('/delete/{id}',[AdminController::class,'delete']);
Route::get('/foodall',[AdminController::class,'food']);
Route::get('/deletefood/{id}',[AdminController::class,'deletefood']);
Route::get('/deletecart/{id}',[HomeController::class,'deleteCart']);
Route::get('/viewupdatefood/{id}',[AdminController::class,'viewupdatefood']);
Route::get('/reservationall',[AdminController::class,'reservationAll']);
Route::get('/chefsall',[AdminController::class,'viewChefs']);
Route::get('/search',[AdminController::class,'search']);
Route::get('/deletechefs/{id}',[AdminController::class,'deleteChefs']);Route::get('/viewupdatechef/{id}',[AdminController::class,'viewUpdateChefs']);
Route::get('/viewcart/{id}',[HomeController::class,'viewCart']);
Route::get('/viewallorder',[AdminController::class,'viewAllOrder']);
Route::post('/updatefood/{id}',[AdminController::class,'updatefood']);
Route::post('/uploadfood',[AdminController::class,'uploadfood']);
Route::post('/uploadreservation',[AdminController::class,'uploadReservation']);
Route::post('/uploadchefs',[AdminController::class,'uploadChefs']);
Route::post('/updatechef/{id}',[AdminController::class,'updateChef']);
Route::post('/addcart/{id}',[HomeController::class,'addCart']);
Route::post('/addorder',[HomeController::class,'addOrder']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
