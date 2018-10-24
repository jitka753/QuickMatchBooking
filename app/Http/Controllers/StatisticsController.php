<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Event;
use App\Booking;
use App\TimeSlot;
use App\Company;

class StatisticsController extends Controller
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
        return view('adminPages.statistics', ['events' => $events,]);
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
        $events =Event::all();

       
        //why is it not working????
        $students = DB::table('bookings')
        ->where('bookings.id_student' ,'!=', NULL)
        ->where('id_event', '=', $id_event)
        ->distinct('bookings.id_student')
        ->groupBy('bookings.id_student')
        ->count();

        $companies = DB::table('companies')
           ->join('company_events', 'companies.id_company', '=', 'company_events.id_company')
           ->where('company_events.id_event', '=', $id_event)
           ->count();

        $timeslots = DB::table('bookings')
        ->where('id_event', '=', $id_event)
        ->count();

        $available = DB::table('bookings')
            ->where('id_student', '=', NULL)
            ->where('id_event', '=', $id_event)
            ->count();

        $taken = DB::table('bookings')
            ->where('id_student', '!=', NULL)
            ->where('id_event', '=', $id_event)
            ->count();
        
        if($timeslots != 0){
        $percentBooked = (($taken / $timeslots) * 100);
        $percentAvailable  = ($available / $timeslots) * 100;
        }else{
            $percentBooked = 0;
            $percentAvailable =0;
        }


        return view('adminPages.show_statistics')->withEvents($events)->withStudents($students)->withCompanies($companies)->withTimeslots($timeslots)->withAvailable($available)->withTaken($taken)->withPercentBooked($percentBooked)->withPercentAvailable($percentAvailable);
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
