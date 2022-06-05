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
    return view('index');
})->name('welcome');



// Auth::routes();

Auth::routes(['register' => false]);

Route::group(['middleware' =>'auth'], function(){

    #####################  Accounts Tree Route #############################
    Route::resource('secur-card',App\Http\Controllers\ScurityCardController::class)->except(['show']);
    ##################### End Accounts Tree  Route ##########################    

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/new-card', [App\Http\Controllers\NewCardController::class, 'index'])->name('new-card');
Route::get('/new-card', [App\Http\Controllers\NewCardController::class, 'index'])->name('new-card');
Route::post('/store-card', [App\Http\Controllers\NewCardController::class, 'store'])->name('store-card');
Route::post('/update-card', [App\Http\Controllers\NewCardController::class, 'updateCard'])->name('update-card');


Route::get('/expire-card-view', [App\Http\Controllers\NewCardController::class, 'expireCardView'])->name('expire-card-view');
Route::post('/expire-card', [App\Http\Controllers\NewCardController::class, 'expireCard'])->name('expire-card');

Route::get('/lose-card-view', [App\Http\Controllers\NewCardController::class, 'loseCardView'])->name('lose-card-view');
Route::post('/lose-card', [App\Http\Controllers\NewCardController::class, 'loseCard'])->name('lose-card');
