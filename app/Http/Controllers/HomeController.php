<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\BusSchedule;
use App\Booking;
use App\Station;
use DB;
use Auth;
use Stevebauman\Location\Facades\Location;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        $stations = Station::all();
        $ip = $req->ip();
        /*Dynamic IP address */
        $ip = '36.75.182.0';
        /* Static IP address */
        $currentUserInfo = Location::get('https://'.$ip);
        return view('customer.index',compact('stations','currentUserInfo'), ['layout' => 'index'],['cek' => 'customer']);
    }

    public function enquiry(Request $request)
    {
        $source = ucfirst($request->source);
        $dest = ucfirst($request->destination);
        $date = $request->travel_date;
        $ip = $request->ip();
        /*Dynamic IP address */
        $ip = '36.75.182.0';
        /* Static IP address */
        $currentUserInfo = Location::get('https://'.$ip);
        $buses = Bus::all();
        $stations = Station::all();

        $schedules = DB::table('bus_schedules')
            ->where('pickup_address', $source)
            ->Where('depart_date', '=', $date)
            // ->orWhere('source', 'like', '%' . Input::get('source') . '%')
            ->where('dropoff_address', $dest)
            ->paginate(10);

        return view('customer.index',compact('stations','currentUserInfo'), ['schedules' => $schedules, 'layout' => 'schedules', 'buses' => $buses, 'source' => $source, 'dest' => $dest, 'date' => $date]);
    }

    public function showall(Request $request)
    {
        $ip = $request->ip();
        /*Dynamic IP address */
        $ip = '36.75.182.0';
        /* Static IP address */
        $currentUserInfo = Location::get('https://'.$ip);
        $schedules = DB::table('bus_schedules')->paginate(10);
        $buses = Bus::get();
        return view('customer.index',compact('currentUserInfo'), ['schedules' => $schedules, 'layout' => 'allSchedules', 'buses' => $buses]);
    }
}