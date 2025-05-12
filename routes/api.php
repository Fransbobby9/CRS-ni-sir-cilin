<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserStatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarRentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

Route::get('/user-statuses', [UserStatusController::class, 'index']);
Route::get('/user-statuses/{id}', [UserStatusController::class, 'show']);
Route::post('/user-statuses', [UserStatusController::class, 'store']);
Route::put('/user-statuses/{id}', [UserStatusController::class, 'update']);
Route::delete('/user-statuses/{id}', [UserStatusController::class, 'destroy']);

Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::post('/payments/penalty/{rentalId}', [PaymentController::class, 'processPenalty']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);

Route::get('/rental-statuses', [RentalStatusController::class, 'index']);
Route::post('/rental-statuses', [RentalStatusController::class, 'store']);
Route::get('/rental-statuses/{id}', [RentalStatusController::class, 'show']);
Route::put('/rental-statuses/{id}', [RentalStatusController::class, 'update']);
Route::delete('/rental-statuses/{id}', [RentalStatusController::class, 'destroy']);

Route::get('/get-customers', [CustomerController::class, 'index']);
Route::get('/get-customers/{id}', [CustomerController::class, 'show']);
Route::post('/add-customer', [CustomerController::class, 'store']);
Route::put('/edit-customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);

Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::post('/cars', [CarController::class, 'store']);
Route::put('/cars/{id}', [CarController::class, 'update']);
Route::delete('/cars/{id}', [CarController::class, 'destroy']);

Route::get('/car-rentals', [CarRentalController::class, 'index']);
Route::get('/car-rentals/{id}', [CarRentalController::class, 'show']);
Route::post('/car-rentals', [CarRentalController::class, 'store']);
Route::put('/car-rentals/{id}', [CarRentalController::class, 'update']);
Route::delete('/car-rentals/{id}', [CarRentalController::class, 'destroy']);




    return $request->user();
});
