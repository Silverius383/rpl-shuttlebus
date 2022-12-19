<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Booking;
use App\Bus; 
use App\User; 
use App\BusSchedule;
use App\Station;
Use App\Mail\validasi;
use Illuminate\Support\Facades\Mail;
use DB;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.admin-dashboard');
    }
    public function indexbus()
    {
        $order = Booking::all();
        $buses = Bus::all();
        return view('admin.admin-validasi', ['layout' => 'checklist', 'booking' => $order, 'buses' => $buses]);
    }
    public function sendmail(int $booking_id){
        $booking = Booking::where('booking_id', $booking_id)->first();
        $users = DB::table('v_bus')->select('booking_id','bus_id','bus_name','price','bus_num')->get();
        $user = User::where('id', $booking->customer_id)->first();
        $pdf = PDF::loadView('customer.invoicebuatan', ['booking_id' => $booking_id, 'booking' => $booking, 'users' => $users, 'user' => $user]);
        $user_email = $user->email;   
        // dd($user_email);
        $pdfHtml = $pdf->output();

            Mail::to($user_email)->send(new validasi($booking, $users, $user, $pdfHtml));
            Session::flash('success', 'Email Berhasil Terkirim ke ' .$user_email);
        return redirect(route('admin.indexbus'));
    }
}