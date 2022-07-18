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
Route::get('/client/{id}/edit', [MainController::class, 'EditClientPage']);
Route::get('/client/{id}', [MainController::class, 'ClientPage']);
Route::post('/client{id}', [ClientsController::class, 'update']);
Route::delete('client/{id}', [ClientsController::class, 'delete']);
Route::get('/create', [MainController::class, 'AddClientPage']);
Route::post('/create', [ClientsController::class, 'create']);
Route::post('/vehicle/{id}/change_status', [VehiclesController::class, 'switch_status']);
Route::get('/vehicle/{id}/edit', [MainController::class, 'EditVehiclesPage']);
Route::get('/vehicle/{id}', [MainController::class]);
Route::post('/vehicle/{id}', [VehiclesController::class, 'update']);
Route::delete('/vehicle/{id}', [VehiclesController::class, 'delete']);

Route::get('/', [MainController::class, 'index']);

