<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Auth;
use App\Models\Contact;
use App\Models\Reservation;
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

    public function reservations()
    {
        return view('reservation');
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

        // Validate the form data
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'message' => 'required|string|min:10',
        // ]);

        // Save data to the database
        // $contact=Contact::create($validated);


    //     Contact::create([
    //     'name' => $request->input('name'),
    //     'email' => $request->input('email'),
    //     'message' => $request->input('message'),
    // ]);


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
