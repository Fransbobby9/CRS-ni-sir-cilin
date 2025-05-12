<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\CarRental;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // 7.1 Get all payment data with car rental details
    public function index()
    {
        return Payment::with('carRental')->get();
    }

    // 7.2 Create a new payment (rental or penalty)
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

    // 7.4 Get a single payment by ID
    public function show($id)
    {
        $payment = Payment::with('carRental')->find($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json($payment, 200);
    }

    // 7.5 Delete a payment
    public function destroy($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully'], 200);
    }
}
