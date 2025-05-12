<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    // Get all user statuses
    public function index()
    {
        $statuses = UserStatus::all();
        return response()->json($statuses, 200);
    }

    // Get a single user status by ID
    public function show($id)
    {
        $status = UserStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'User status not found'], 404);
        }

        return response()->json($status, 200);
    }

    // Store a new user status
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:user_statuses,name',
        ]);

        $status = UserStatus::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'User status created successfully', 'status' => $status], 201);
    }

    // Update an existing user status
    public function update(Request $request, $id)
    {
        $status = UserStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'User status not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:user_statuses,name,' . $id,
        ]);

        $status->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'User status updated successfully', 'status' => $status], 200);
    }

    // Delete a user status
    public function destroy($id)
    {
        $status = UserStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'User status not found'], 404);
        }

        $status->delete();

        return response()->json(['message' => 'User status deleted successfully'], 200);
    }
}
