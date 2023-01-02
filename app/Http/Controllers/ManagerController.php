<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Bus; 
use App\BusSchedule;
use App\Station;
use Illuminate\Http\Request;
use Auth;
use App\User; 

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
    public function index(Request $request)
    {
        $buses = Bus::all();
        $book = Booking::all();
        $jadwal = BusSchedule::all();
        $stasiun = Station::all();
        $dalam = BusSchedule::whereColumn('dropoff_address', '=', 'pickup_address');
        $luar = BusSchedule::whereColumn('dropoff_address', '!=', 'pickup_address');
        $institut = BusSchedule::where('status', '=', '1');
        $waktuawal = $request->waktuawal;
        $waktuakhir = $request->waktuakhir;
        $tanggal_awal = date('Y-m-d',strtotime('waktuawal'));
        $tanggal_akhir = date('Y-m-d',strtotime('waktuakhir'));
        $rute = $request->rute;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perKota =  Booking::where('schedule_id', $rute);
        $data = Booking::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();
        return view('manager.manager-dashboard', compact('buses','book','dalam', 'luar', 'jadwal','jadwalrute',  'data' ,  'stasiun', 'institut'));
    }
    public function caritanggalmg(Request $request)
    {
        $buses = Bus::all();
        $book = Booking::all();
        $jadwal = BusSchedule::all();
        $stasiun = Station::all();
        $dalam = BusSchedule::whereColumn('dropoff_address', '=', 'pickup_address');
        $luar = BusSchedule::whereColumn('dropoff_address', '!=', 'pickup_address');
        $institut = BusSchedule::where('status', '=', '1');
        $tanggal_awal = $request->waktuawal;
        $tanggal_akhir = $request->waktuakhir;
        // $tanggal_awal = date('Y-m-d',strtotime('waktuawal'));
        // $tanggal_akhir = date('Y-m-d',strtotime('waktuakhir'));
        $data = Booking::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();
        $rute = $request->rute;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perKota =  Booking::where('schedule_id', $rute);
        return view('manager.manager-dashboard', compact('buses','book','dalam', 'luar', 'jadwal', 'stasiun', 'institut', 'data', 'jadwalrute'));
    }
    public function rute(Request $request)
    {
        $buses = Bus::all();
        $book = Booking::all();
        $jadwal = BusSchedule::all();
        $stasiun = Station::all();
        $dalam = BusSchedule::whereColumn('dropoff_address', '=', 'pickup_address');
        $luar = BusSchedule::whereColumn('dropoff_address', '!=', 'pickup_address');
        $institut = BusSchedule::where('status', '=', '1');
        $tanggal_awal = $request->waktuawal;
        $tanggal_akhir = $request->waktuakhir;
        $tanggal_awal = date('Y-m-d',strtotime('waktuawal'));
        $tanggal_akhir = date('Y-m-d',strtotime('waktuakhir'));
        $data = Booking::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();
        $rute = $request->rute;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perKota =  Booking::where('schedule_id', $rute);
        return view('manager.manager-dashboard', compact('buses','book','dalam', 'luar', 'jadwal','jadwalrute', 'stasiun', 'institut', 'data'));
    }
}