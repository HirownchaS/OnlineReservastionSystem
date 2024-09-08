<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Auth;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\Menu;
use App\Models\User;
use App\Notifications\ReservationCancelledNotification;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(){
        if(Auth::user()->role==='customer'){
            return redirect('/reservations');
        }
        return view('Layout.dashboard');
    }

    public function index()
    {
        return view ('home');
    }

    public function services()
    {
        return view('services');
    }

    public function menus(){
        $menus=Menu::all();
        return view ('menu', compact('menus'));
    }
    public function reservations()
    {
        $reservations=Reservation::where('user_id',Auth::user()->id)->get();
        return view('reservation', compact('reservations'));
    }

    public function submitReservation(Request $request)
    {
        // Validate the form data
        Reservation::create($request->all());
        return redirect()->route('reservation')->with('success', 'Your reservation has been successfully submitted!');
    }
    public function contact()
    {

        return view('contact');
    }
    public function submitContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');


    }

    public function cancelReservation($id)
    {
        $reservation = Reservation::findOrFail($id); // Find reservation by id
        $reservation->delete(); // Delete the reservation

        // Send notification to the admin
    $admin = User::where('role', 'admin')->first(); // Adjust to your setup for finding the admin
    if ($admin) {
        $admin->notify(new ReservationCancelledNotification($reservation));
    }

        return redirect()->route('reservation')->with('Reservation cancelled successfully.');
    }
    public function about()
    {
        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
