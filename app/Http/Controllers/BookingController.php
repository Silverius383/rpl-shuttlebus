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


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth:bus');

    }
    
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $order = Booking::where(['customer_id' => $user])->get();
        $buses = Bus::all();
        $stations = Station::all();
            $ip = $request->ip();
            /*Dynamic IP address */
            $ip = '36.75.182.0';
            /* Static IP address */
            $currentUserInfo = Location::get('https://'.$ip);
        return view('customer.index', compact('stations','currentUserInfo'), ['layout' => 'checklist', 'booking' => $order, 'buses' => $buses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $schedule_id)
    {
        
        $users = DB::table('bookings')->select('booking_id','customer_id','bus_id','pid','schedule_id','seats_booked','source','destination','total_price','status')->where('schedule_id', '=', $schedule_id)->get();
        $booking = DB::table('bookings')->where('schedule_id', '=', $schedule_id)->first();
        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $schedule_id)->first();
        $bus = DB::table('buses')->where('bus_id', '=', $schedule->bus_id)->first();

        $v = $users;
        $u = [];
        for ($i=0; $i <=count($v) ; $i++) {
            foreach ((array)json_decode($v[$i]->seats_booked ?? '') as $item) {
                $u[] = $item;
            }  
        }
        
        $seats = $u;
       
            $stations = Station::all();
            $ip = $request->ip();
            /*Dynamic IP address */
            $ip = '36.75.182.0';
            /* Static IP address */
            $currentUserInfo = Location::get('https://'.$ip);
            

        
        return view('customer.index', compact('stations','currentUserInfo'), ['schedule' => $schedule, 'layout' => 'addBooking', 'seats' => $seats, 'bus' => $bus, 'booking' => $booking]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $schedule_id)
    {
        $bookings = new Booking;

        $this->validate($request, [
            'seats_booked'  =>  'required',
            'source'        =>  'required',
            'destination'   =>  'required',
            // 'status'        =>  'required',
        ]);

        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $schedule_id)->first();
        $bus = DB::table('buses')->where('bus_id', '=', $schedule->bus_id)->first();

        $pid = $this->getPid();
        // if(in_array(ucfirst("$request->destination"), (array)$schedule->stations)){

        //     if(in_array(ucfirst("$request->source"), (array)$schedule->stations)){
        //     // if(count(array_intersect(array(ucfirst($request->source), ucfirst($request->destination)), (array)$schedule->stations)) == 2){
                $bookings->customer_id = Auth::user()->id;
                $bookings->bus_id    =   $schedule->bus_id;
                $bookings->pid   = $pid;
                $bookings->schedule_id    =   $schedule->schedule_id;
                $bookings->total_price = (int)$schedule->price * count($request->seats_booked);
                $bookings->seats_booked = $request->seats_booked;
                $bookings->source = ucfirst($request->source);
                $bookings->destination = ucfirst($request->destination);
        
                if(isset($request->status)){
                    $bookings->status = 1;
                }else{
                    $bookings->status = 0;
                }
                
                $booked = json_decode($bus->seats, true);
                
                // foreach ($request->seats_booked as $book) {
                $booked[] = $request->seats_booked;
                // }
                
                DB::table('buses')->where('bus_id', $schedule->bus_id)->update([
                    'seats' => $booked
                    ]);
                    
                $bookings->save();
                // dd($bus->seats);

                $user = Auth::user()->id;
                $booking = Booking::where(['customer_id' => $user])->get();
                $buses = Bus::all();
                $stations = Station::all();
            $ip = $request->ip();
            /*Dynamic IP address */
            $ip = '36.75.182.0';
            /* Static IP address */
            $currentUserInfo = Location::get('https://'.$ip);

                Session::flash('success', 'Your Seat Booked Successsfully');

                return view('customer.index', compact('stations','currentUserInfo'), ['layout' => 'checklist', 'buses' => $buses, 'bus'    =>$bus, 'bookings' => $bookings, 'booking' => $booking]);
        //     }else{
        //         Session::flash('success', 'Please Check Your Source Address');
        //     return redirect()->back();
        //     }
        // }
        // else{
        //     Session::flash('error', 'Please Check Your Destination Address');
        //     return redirect()->back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('customer.index', ['layout' => 'editBooking', 'booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $bus = DB::table('buses')->where('bus_id', '=', $booking->bus_id)->first();
        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $booking->schedule_id)->first();
        return view('customer.index', ['layout' => 'editBooking', 'booking' => $booking, 'schedule' => $schedule, 'bus' => $bus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bookings = Booking::all();
        $buses = Bus::all();
        $booking = Booking::find($id);

        $this->validate($request, [
            'seats_booked'  =>  'required',
            'source'        =>  'required',
            'destination'   =>  'required',
            // 'status'        =>  'required',
        ]);

        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $booking->schedule_id)->first();
        $bus = DB::table('buses')->where('bus_id', '=', $booking->bus_id)->first();

        $pid = $this->getPid();
        
        // if(in_array(ucfirst($request->source), ucfirst($request->destination), array($bus->stations))){
            $booking->customer_id = Auth::user()->id;
            $booking->bus_id    =   $schedule->bus_id;
            $booking->pid   = $pid;
            $booking->schedule_id    =   $schedule->schedule_id;
            $booking->total_price = $schedule->price * count($request->seats_booked);
            $booking->seats_booked = $request->seats_booked;
            $booking->source = $request->source;
            $booking->destination = $request->destination;
    
            if(isset($request->status)){
                $booking->status = 1;
            }else{
                $booking->status = 0;
            }

            DB::table('buses')->where('bus_id', $booking->bus_id)->update([
                'seats' => array_merge((array)$bus->seats, $booking->seats_booked)
                ]);
            
            $booking->save();

            Session::flash('success', 'Your Ticket Updated Successsfully');

            // dd($booking);
            // return view('customer.index', ['layout' => 'checklist', 'buses' => $buses, 'bookings' => $bookings]);

        // }else{
            // Session::flash('error', 'Please Check Your Source or Destination Address');
            return redirect(route('booking.index'));
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookings = Booking::find($id);
        // $bus = DB::table('buses')->where('bus_id', '=', $booking->bus_id);
        // foreach ($booking->seats_booked as $key => $seat) {
        //     if(in_array($seat, $bus->seats)){
        //         $seats_removed = array_pop($bus->seats);
        //     }
        // }
        DB::table('buses')->where('bus_id', $bookings->bus_id)->update([
            'seats' => NULL
            ]);
        $bookings->delete();
        Session::flash('success', 'Your Reservation Removed Successfully');
        return redirect(route('booking.index'));
    }

    public function success($booking_id)
    {
        $oid = $_GET['oid'];
        $amt = $_GET['amt'];
        $refId = $_GET['refId'];
        $booking = DB::table('bookings')->where('booking_id', '=', $booking_id);

        $url = "https://uat.esewa.com.np/epay/main";
        $data =[
            'amt'=> $booking->total_price,
            'pdc'=> 0,
            'psc'=> 0,
            'txAmt'=> 0,
            'tAmt'=> $booking->total_price,
            'pid'=> $booking->ticked_id,
            'scd'=> 'epay_payment',
            'su'=>'http://localhost:8000/home/booking/'.$booking->ticket_id.'?q=su',
            'fu'=>'http://localhost:8000/home/booking/'.$booking->ticket_id.'?q=fu'
        ];  

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            // echo $response;
            curl_close($curl);
            if(strpos( $response, "Success" !== false)){
                return view('customer.success');
            }else{
                return view('customer.failure');
            }
    }

    public function failure($booking_id)
    {
        return view('customer.failure');
    }

    public function getPid()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $pid = ''; 
       
        for ($i = 0; $i < 10; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $pid .= $characters[$index];
        }

        return $pid;
    }

    public function viewpdf(int $booking_id){
        $booking = Booking::find($booking_id);
        $view = Booking::findOrFail($booking_id);
        $users = DB::table('v_bus')->select('booking_id','bus_id','bus_name','price','bus_num')->get();

        return view('customer.invoice', compact('booking', 'users'));
    }

    public function downloadpdf(int $booking_id){
        $view = Booking::findOrFail($booking_id);
        $booking = Booking::find($booking_id);
        $users = DB::table('v_bus')->select('booking_id','bus_id','bus_name','price','bus_num')->get();
        $data = ['booking' => $booking];
        $pdf = PDF::loadView('customer.invoice', array('users' => $users,'booking'=>$booking));
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.'-'.$todayDate.'.pdf');
    }

    public function upload($id){
        $booking = Booking::find($id);
        return view('customer.uploadfile', ['booking'=>$booking]);
    }

    public function fileupload($id, $url){
        $order = Booking::find($id);
        $order->file =$url;
        $order->save();
        return redirect('/home/booking');
    }
    
}