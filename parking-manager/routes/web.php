<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MainController, ClientsController, VehiclesController};

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
Route::get('/edit/client/{id}', [ClientsController::class]);
Route::get('/client/{id}', [MainController::class, 'ClientPage']);
Route::delete('client/{id}', [ClientsController::class, 'delete']);
Route::get('/create', [MainController::class, 'AddClientPage']);
Route::post('/create', [ClientsController::class, 'create']);

Route::get('/', [MainController::class, 'index']);

