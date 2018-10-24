<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\TimeSlot;
use App\Event;
use App\CompanyEvent;
use App\Booking;
use DB;

class ListBookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $events = Event::all();
        return view('pages.listbookings', ['events' => $events,]);
    }

    public function show($id_event){
        $event = Event::find($id_event);
        
        $time_slots = DB::table('companies')
        ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
        ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
        ->join('users', 'bookings.id_student', '=', 'users.id')
        ->select('time_slots.*', 'users.name as name', 'time_slots.time_slot_value as time_slot_value', 'time_slots.id_time_slot as id_time_slot','companies.id_company as id_company', 'companies.companyName as companyName','bookings.id_student as id_student', 'bookings.id_booking as id_booking')           
        ->where('id_student', '=', Auth::id())      
        ->orderBy('time_slot_value', 'asc')     
        ->get();

        return view('pages.show_listbookings', ['time_slots' => $time_slots])->withEvent($event);
    }



    // public function prnpriview(){

    //     $time_slots = DB::table('companies')
    //     ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
    //     ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
    //     ->join('users', 'bookings.id_student', '=', 'users.id')
    //     ->select('time_slots.*', 'users.name as name', 'time_slots.time_slot_value as time_slot_value', 'companies.id_company as id_company', 'companies.companyName as companyName','bookings.id_student as id_student', 'bookings.id_booking as id_booking')           
    //     ->where('id_student', '=', Auth::id())      
    //     ->orderBy('time_slot_value', 'asc')     
    //     ->get();

    //  return view('pages.printbookings', ['time_slots' => $time_slots,]);

    // }
}
