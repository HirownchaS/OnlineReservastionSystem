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
        

        // Dispatch the event
    // event(new ReservationCreated($reservation));

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
    //    $validated= $request->validate([
    //     'phone' => 'required|min:9',
    //     'date' => 'required|date',
    //     'time' => 'required|date_format:H:i',
    //     'guests' => 'required|integer|min:1',
    //     'service_type' => 'required|string|max:255',
    //     'status' => 'required|string|in:pending,confirmed,cancelled',
    //     ]);

    // dd($request);
    
        $reservation = Reservation::findOrFail($id);
        $reservation->phone=$request->phone;
        $reservation->date=$request->date;
        $reservation->time=$request->time;
        $reservation->guests=$request->guests;
        $reservation->service_type=$request->service_type;
        $reservation->status=$request->status;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
