<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Company;
use App\TimeSlot;
use App\Event;
use App\CompanyEvent;
use App\Booking;
use DB;

class ListOfBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        return view('pages.listbookings', ['events' => $events,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_event)
    {
        $event = Event::find($id_event);
        $id_event = $id_event;

        $eventName = DB::table('events')->where('id_event', $id_event)->value('eventName');

        $time_slots = DB::table('companies')
        ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
        ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
        ->join('users', 'bookings.id_student', '=', 'users.id')
        ->select('time_slots.*', 'users.name as name', 'bookings.id_event as id_event','time_slots.time_slot_value as time_slot_value', 'time_slots.id_time_slot as id_time_slot','companies.id_company as id_company', 'companies.companyName as companyName','bookings.id_student as id_student', 'bookings.id_booking as id_booking')           
        ->where('id_student', '=', Auth::id()) 
        ->where('id_event', '=', $id_event )     
        ->orderBy('time_slot_value', 'asc')     
        ->get();

        return view('pages.show_listbookings', ['event'=> $event,'time_slots' => $time_slots])->withEventName($eventName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
