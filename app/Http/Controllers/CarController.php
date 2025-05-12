<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Get all cars
    public function index()
    {
        return response()->json(Car::all(), 200);
    }

    // Get a specific car by ID
    public function show($id)
    {
        $car = Car::with('carRentals')->find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car, 200);
    }

    // Create a new car
    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $car = Car::create($request->all());

        return response()->json(['message' => 'Car created successfully', 'car' => $car], 201);
    }

    // Update an existing car
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $request->validate([
            'car_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $car->update($request->all());

        return response()->json(['message' => 'Car updated successfully', 'car' => $car], 200);
    }

    // Delete a car
    public function destroy($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted successfully'], 200);
    }
}
