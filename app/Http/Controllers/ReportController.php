<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $reservations= Reservation::orderBy("created_at","desc")->paginate(10);
        return view("reports.index",compact("reservations"));
    }
}
