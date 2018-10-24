<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Company;
use App\TimeSlot;
use App\Event;
use App\CompanyEvent;
use App\Booking;
use App\User;
use DB;
use Illuminate\Http\Request;

class EventsController extends Controller
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

       // $book = Booking::where('id_company', $comp_id)->where('id_student', Auth::id())->first();

        return view('pages.events', ['events' => $events]);
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
        $idevent = $id_event;
        
        $eventName = DB::table('events')->where('id_event', $id_event)->value('eventName');

        $companies = DB::table('companies')
            ->join('company_events','companies.id_company', '=', 'company_events.id_company')
            ->where('company_events.id_event', '=', $idevent)
            ->get();

//big table from which we display available time-slots for each company
        $time_slots = DB::table('companies')
            ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
            ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
            ->select('time_slots.*', 'companies.companyName as companyName','time_slots.id_time_slot as id_time_slot', 'companies.id_company as id_company', 'bookings.id_event as id_event', 'bookings.id_student as id_student', 'bookings.id_booking as id_booking')
            ->where('id_student', '=', null)
            ->where('id_event', '=', $idevent)
            ->get();

        //fetch events - to be displayed in the drop down
        $events = Event::all();
        $eventsDropDown = Event::pluck('eventName', 'id_event');

        $eventname = DB::table('events')
        ->select('eventName')
        ->where('id_event' ,'=', $idevent)
        ->get();

//We get all the companies
        $comps = Company::all();

        //We create a blank array
        $array_comp_ids = array();
        $array_times = array();

        //We take the companies list one by one
        foreach ($comps as $comp) {
            //We fill our empty array with the ids of the companies
            $array_comp_ids[] = $comp->id_company;
        }

        //We are parsing that array with ids
        foreach ($array_comp_ids as $comp_id) {
            //We just take that row if it exists
            $book = Booking::where('id_company', $comp_id)->where('id_student', Auth::id())->first();

            $array_times[$comp_id] = array();

            if ($book) {
                $time = TimeSlot::where('id_time_slot', $book->id_time_slot)->first();

                $array_times[$comp_id]['booking'] = $book->id_booking;

                $array_times[$comp_id]['timeslot'] = substr($time->time_slot_value, 0, 5);

            } else {

                $array_times[$comp_id]['booking'] = 0;

                $array_times[$comp_id]['timeslot'] = 0;

            }
        }

        return view('pages.show_bookings', ['eventsDropDown' => $eventsDropDown, 'companies' => $companies, 'time_slots' => $time_slots, 'company_time' => $array_times])->withIdevent($idevent)->withEventName($eventName);
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
