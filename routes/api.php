<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserStatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarRentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalStatusController;
use App\Http\Controllers\Aunthentication; // Keep your class name


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication routes
Route::post('register', [Aunthentication::class, 'register']);
Route::post('login', [Aunthentication::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('logout', [Aunthentication::class, 'logout']);

    // User statuses
    Route::get('/user-statuses', [UserStatusController::class, 'index']);
    Route::get('/user-statuses/{id}', [UserStatusController::class, 'show']);
    Route::post('/user-statuses', [UserStatusController::class, 'store']);
    Route::put('/user-statuses/{id}', [UserStatusController::class, 'update']);
    Route::delete('/user-statuses/{id}', [UserStatusController::class, 'destroy']);

    // Payments
    Route::get('/payments', [PaymentController::class, 'index']);
    Route::post('/payments', [PaymentController::class, 'store']);
    Route::put('/payments/{id}', [PaymentController::class, 'update']);
    Route::post('/payments/penalty/{rentalId}', [PaymentController::class, 'processPenalty']);
    Route::get('/payments/{id}', [PaymentController::class, 'show']);
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);

    // Rental statuses
    Route::get('/rental-statuses', [RentalStatusController::class, 'index']);
    Route::post('/rental-statuses', [RentalStatusController::class, 'store']);
    Route::get('/rental-statuses/{id}', [RentalStatusController::class, 'show']);
    Route::put('/rental-statuses/{id}', [RentalStatusController::class, 'update']);
    Route::delete('/rental-statuses/{id}', [RentalStatusController::class, 'destroy']);

    // Customers
    Route::get('/get-customers', [CustomerController::class, 'index']);
    Route::get('/get-customers/{id}', [CustomerController::class, 'show']);
    Route::post('/add-customer', [CustomerController::class, 'store']);
    Route::put('/edit-customer/{id}', [CustomerController::class, 'update']);
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);

    // Cars
    Route::get('/cars', [CarController::class, 'index']);
    Route::get('/cars/{id}', [CarController::class, 'show']);
    Route::post('/cars', [CarController::class, 'store']);
    Route::put('/cars/{id}', [CarController::class, 'update']);
    Route::delete('/cars/{id}', [CarController::class, 'destroy']);

    // Car rentals
    Route::get('/car-rentals', [CarRentalController::class, 'index']);
    Route::get('/car-rentals/{id}', [CarRentalController::class, 'show']);
    Route::post('/car-rentals', [CarRentalController::class, 'store']);
    Route::put('/car-rentals/{id}', [CarRentalController::class, 'update']);
    Route::delete('/car-rentals/{id}', [CarRentalController::class, 'destroy']);

     Route::get('/agent', [CustomerController::class, 'index']); // Get all customers
    Route::get('/agent/{id}', [CustomerController::class, 'show']); // Get a specific customer
    Route::post('/agent', [CustomerController::class, 'store']); // Create a new customer
    Route::put('/agent/{id}', [CustomerController::class, 'update']); // Update a customer
    Route::delete('/agent/{id}', [CustomerController::class, 'destroy']); // Delete a customer
});