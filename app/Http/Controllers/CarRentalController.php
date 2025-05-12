<?php

namespace App\Http\Controllers;

use App\Models\CarRental;
use Illuminate\Http\Request;

class CarRentalController extends Controller
{
    // Get all car rentals with car and customer relationships
    public function index()
    {
        $rentals = CarRental::with('car', 'customer')->get();
        return response()->json($rentals, 200);
    }

    // Get a single rental by ID
    public function show($id)
    {
        $rental = CarRental::with('car', 'customer')->find($id);
        if (!$rental) {
            return response()->json(['message' => 'Car rental not found'], 404);
        }
        return response()->json($rental, 200);
    }

    // Create a new car rental
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'rental_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255', // e.g., "ongoing", "completed"
        ]);

        $rental = CarRental::create($validated);

        return response()->json(['message' => 'Car rental created successfully', 'rental' => $rental], 201);
    }

    // Update a rental
    public function update(Request $request, $id)
    {
        $rental = CarRental::find($id);
        if (!$rental) {
            return response()->json(['message' => 'Car rental not found'], 404);
        }

        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'rental_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

        $rental->update($validated);

        return response()->json(['message' => 'Car rental updated successfully', 'rental' => $rental], 200);
    }

    // Delete a rental
    public function destroy($id)
    {
        $rental = CarRental::find($id);
        if (!$rental) {
            return response()->json(['message' => 'Car rental not found'], 404);
        }

        $rental->delete();

        return response()->json(['message' => 'Car rental deleted successfully'], 200);
    }
}
