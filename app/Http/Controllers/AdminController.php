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
use Carbon\Carbon;

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
        $data = Booking::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();
        $rute = $request->rute;
        $kota = $request->kota;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perrute =  Booking::where('schedule_id', $rute);
        $perkota =  BusSchedule::where('pickup_address', $kota)->where('status', 1);
        return view('admin.admin-dashboard', compact('buses','book','dalam', 'luar', 'jadwal', 'stasiun','perkota', 'perrute',  'institut', 'data'));
    }
    public function caritanggal(Request $request)
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
        $data = Booking::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();
        $rute = $request->rute;
        $kota = $request->kota;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perrute =  Booking::where('schedule_id', $rute);
        $perkota =  BusSchedule::where('pickup_address', $kota)->where('status', 1);
        return view('admin.admin-dashboard', compact('buses','book','dalam', 'luar', 'jadwal','perrute', 'perkota', 'stasiun', 'institut', 'data'));
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
        $kota = $request->kota;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perrute =  Booking::where('schedule_id', $rute);
        $perkota =  BusSchedule::where('pickup_address', $kota)->where('status', 1);
        return view('admin.admin-dashboard', compact('buses','book','dalam', 'luar', 'jadwal','perrute', 'perkota', 'stasiun', 'institut', 'data'));
    }
    public function institusiperkota(Request $request)
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
        $kota = $request->kota;
        $jadwal = BusSchedule::all();
        $jadwalrute = BusSchedule::where('schedule_id', '=', $rute);
        $perrute =  Booking::where('schedule_id', $rute);
        $perkota =  BusSchedule::where('pickup_address', $kota)->where('status', 1);
        return view('admin.admin-dashboard', compact('buses','book','dalam', 'luar', 'jadwal','perrute', 'perkota', 'stasiun', 'institut', 'data'));
    }
    public function indexbus()
    {
        $order = Booking::all();
        $buses = Bus::all();
        // $user = DB::table('users')->select('fname', 'lname')->where('customer_id', '=', $customer_id )->get();
        $users = User::all();
        
        return view('admin.admin-validasi', ['layout' => 'checklist', 'booking' => $order, 'buses' => $buses, 'users' => $users]);
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
            DB::table('bookings')->where('booking_id', $booking_id)->update(array(
                'status' => '1'));
            $booking->save();
            Session::flash('success', 'Email Berhasil Terkirim ke ' .$user_email);
        return redirect(route('admin.indexbus'));
    }
    public function viewarea() {
        $book1 = DB::table('bookings')->whereColumn('source', '=', 'destination')->get();
        $book2 = DB::table('bookings')->whereColumn('source', '!=', 'destination')->get();


        return view('admin.laporanarea',compact('book1','book2'));
    }
    public function viewwaktu() {
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->endOfMonth();
        $book = DB::table('bookings')->whereBetween('created_at',[$dateS, $dateE])->get();
        return view('admin.laporanwaktu',compact('book'));
    }
    public function downloadarea(){
        $book1 = DB::table('bookings')->whereColumn('source', '=', 'destination')->get();
        $book2 = DB::table('bookings')->whereColumn('source', '!=', 'destination')->get();
        $pdf = PDF::loadView('admin.laporanarea', array('book1' => $book1,'book2'=>$book2));
        return $pdf->download('LaporanPerArea'.'.pdf');
    }
    public function downloadwaktu(){
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->endOfMonth();
        $book = DB::table('bookings')->whereBetween('created_at',[$dateS, $dateE])->get();
        $pdf = PDF::loadView('admin.laporanwaktu', array('book' => $book));
        return $pdf->download('LaporanPerBulan'.'.pdf');
    }

}