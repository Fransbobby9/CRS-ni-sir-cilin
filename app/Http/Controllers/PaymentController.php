<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\CarRental;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // 7.1 Get payment data
    public function index()
    {
        return Payment::with('carRental')->get();
    }

    // 7.2 Process rental payment
    public function store(Request $request)
    {
        $request->validate([
            'car_rental_id' => 'required|exists:car_rentals,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:rental,penalty',
            'payment_date' => 'required|date',
        ]);

        return Payment::create($request->all());
    }

    // 7.3 Process late return penalty
    public function processPenalty($rentalId)
    {
        $rental = CarRental::findOrFail($rentalId);

        if (now()->greaterThan($rental->return_date)) {
            $daysLate = now()->diffInDays($rental->return_date);
            $penalty = $daysLate * 100; // example: 100 per day

            return Payment::create([
                'car_rental_id' => $rentalId,
                'amount' => $penalty,
                'type' => 'penalty',
                'payment_date' => now(),
            ]);
        }

        return response()->json(['message' => 'No penalty applicable'], 200);
    }
}
