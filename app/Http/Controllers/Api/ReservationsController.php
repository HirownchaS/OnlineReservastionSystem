<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationsController extends Controller
{
    public function index(){
        return Reservation::all();
        // return response()->json(['message' => 'User deleted successfully']);
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'phone' => 'required|string|max:15', // Validate phone number
        'service_type' => 'required|string', // Validate service type (e.g., dine-in, delivery)
        'date' => 'required|date', // Validate date
        'time' => 'required', // Validate time
        'guests' => 'required|integer|min:1', // Validate guest count
        'status' => 'required|string' // Validate status
    ]);

    $reservation = Reservation::create($validatedData);

    return response()->json([
        'message' => 'Reservation created successfully!',
        'body' => $reservation
    ], 201);
}

public function update(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->update($request->all());
    return response()->json($reservation, 200);
}
public function destroy($id)
{
    Reservation::destroy($id);
    return response()->json(['message' => 'User deleted successfully']);
}

}
