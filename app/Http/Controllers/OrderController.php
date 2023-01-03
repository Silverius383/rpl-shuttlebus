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
    
    public function downloadpdf(){
        $data = \DB::table('bookings')
       ->select([
        \DB::raw('count(*) as jumlah'),
        \DB::raw('DATE(created_at) as tanggal')
       ])
       ->groupBy('tanggal')
       ->orderBy('tanggal', 'desc')
       ->get()
       ->toArray();
        $pdf = PDF::loadView('admin.admin-pemesanan', compact('data'));
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('Transaksi Tanggal'.'-'.$todayDate.'.pdf');
    }
}