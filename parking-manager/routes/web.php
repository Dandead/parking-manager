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
Route::post('/delete/client/{id}', [ClientsController::class, 'delete']);
Route::post('/delete/vehicle/{id}', [VehiclesController::class, 'delete']);
Route::get('/client/{id}', [MainController::class, 'ClientPage']);
Route::post('/client/{id}', [ClientsController::class, 'update']);
Route::get('/create/client', [MainController::class, 'AddClientPage']);
Route::post('/create/client', [ClientsController::class, 'create']);
Route::post('/get_vehicles', [MainController::class, 'GetClientCars'])->name('MainController.GetClientCars');
Route::post('/parking', [VehiclesController::class, 'switch_status']);
Route::get('/parking', [MainController::class, 'DisplayParking']);
Route::get('/', [MainController::class, 'index']);

