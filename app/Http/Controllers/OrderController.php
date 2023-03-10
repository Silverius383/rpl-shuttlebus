<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Booking;
use App\Bus;
use App\BusSchedule;
use App\Station;
use Auth;
use DB;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Stevebauman\Location\Facades\Location;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('auth:bus');

    }
    
    public function index(Request $request)
    {
       $data = \DB::table('bookings')
       ->select([
        \DB::raw('count(*) as jumlah'),
        \DB::raw('DATE(created_at) as tanggal')
       ])
       ->groupBy('tanggal')
       ->orderBy('tanggal', 'desc')
       ->get()
       ->toArray();
        // send this

    //    dd($data);
    return view('admin.admin-pemesanan', compact('data'));

    }
    // public function viewpdf(){
    //     $book1 = DB::table('bookings')->whereColumn('source', '=', 'destination')->where('validasi',1)->get();
    //     // $booking = Booking::find($booking_id);
    //     // $view = Booking::findOrFail($booking_id);
    //     $users = DB::table('v_bus')->select('booking_id','bus_id','bus_name','price','bus_num')->get();

    //     return view('customer.invoice', compact('booking', 'users'));
    // }
    
}