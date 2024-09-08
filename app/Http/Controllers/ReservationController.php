<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Events\ReservationCreated;
use App\Notifications\ReservationStatusChanged;
use App\Mail\ReservationStatusMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ReservationConfirmedNotification;
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
       $reservation= Reservation::create($request->all());
        

        // Dispatch the event
    event(new ReservationCreated($reservation));

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
    public function confirm($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'confirmed';
        $reservation->save();

        // Notify the user
        // Send a notification to the customer
    
   $reservation->user->notify(new ReservationConfirmedNotification($reservation));

        return redirect()->back()->with('success', 'Reservation confirmed!');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'cancelled';
        $reservation->save();

        // Notify the user
        $reservation->user->notify(new ReservationStatusChanged($reservation, 'cancelled'));
         // Send email notification
    Mail::to($reservation->customer->email)->send(new ReservationStatusMail($reservation, 'cancelled'));
        return redirect()->back()->with('success', 'Reservation cancelled!');
    }
}
