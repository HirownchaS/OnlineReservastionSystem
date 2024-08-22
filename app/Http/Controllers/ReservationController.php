<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
class ReservationController extends Controller
{
    // public function __construct()
    // {
    //     // Ensure the user is logged in
    //     $this->middleware('auth');
    // }
    public function index()
    {
        // $reservations = Reservation::where('user_id', Auth::id())->get();
        $reservations=Reservation::all();
        return view('reservations.index', compact('reservations'));
    }



    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        Reservation::create($request->all());
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'phone' => 'required|string|max:15',
        //     'date' => 'required|date|after_or_equal:today',
        //     'time' => 'required',
        //     'guests' => 'required|integer|min:1|max:20',
        // ]);


        return redirect()->route('reservations.index')->with('success', 'Your reservation has been successfully submitted!');
    }
    // public function show($id)
    // {
    //     $reservation = Reservation::findOrFail($id);
    //     return view('reservations.show', compact('reservation'));
    // }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
       $validated= $request->validate([
        'phone' => 'required|min:9',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'guests' => 'required|integer|min:1',
        'service_type' => 'required|string|max:255',
        'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
