<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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
});

Route::get('/{thumb}/{image}', [AppController::class, 'showImage']);

Route::get('/https://img.giaibaitap.me/picture/article/{a}/{b}/{url}', [AppController::class, 'index']);

Route::get('/http://127.0.0.1:8000/storage/{url}', [AppController::class, 'indexMain']);
