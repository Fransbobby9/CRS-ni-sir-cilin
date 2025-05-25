<?php
namespace App\Http\Controllers;

use App\Models\RentalStatus; // Add this line
use Illuminate\Http\Request;

class RentalStatusController extends Controller
{
    public function index() {
        return RentalStatus::all();
    }

    public function store(Request $request) {
        return RentalStatus::create($request->validate(['status_name' => 'required|string']));
    }

    public function update(Request $request, $id) {
        $status = RentalStatus::findOrFail($id);
        $status->update($request->validate(['status_name' => 'required|string']));
        return $status;
    }

    public function destroy($id) {
        RentalStatus::findOrFail($id)->delete();
        return response()->noContent();
    }
}