<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{

    public function login(){
        return view('auth.login');
    }
    public function manageReservations()
    {
        $reservations = Reservation::all();
        return view('admin.reservations', compact('reservations'));
    }
    // public function index()
    // {
    //     $users=User::all();
    //     return view('users.adminDashboard', compact('users'));
    // }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/login');
    }

    public function viewUsers() {
        $users=User::all();
        return view(users.users ,compact('users'));
    }
}
