<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Bus; 
use App\BusSchedule;
use App\Station;
use Illuminate\Http\Request;
use Auth;
use App\Booking;
use App\Bus; 
use App\User; 
use App\BusSchedule;
use App\Station;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth:manager');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buses = Bus::all();
        $book = Booking::all();
        $jadwal = BusSchedule::all();
        $stasiun = Station::all();
        return view('manager.manager-dashboard', compact('buses','book', 'jadwal', 'stasiun'));
    }
}