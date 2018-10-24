<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\CompanyEvent;
use App\Booking;
use App\TimeSlot;
use App\Company;

class ShowStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_company, $id_event)
    {
     
        $company = Company::find($id_company);

        $event = $id_event;

        $companystudents = DB::table('companies')
        ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
        ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
        ->join('users', 'bookings.id_student', '=', 'users.id')
        ->select('time_slots.*', 'time_slots.id_time_slot as id_time_slot','time_slots.time_slot_value as time_slot_value', 'companies.id_company as id_company', 'companies.companyName as companyName', 
        'users.name as firstName', 'users.studentLastName as lastName', 'users.studentDescription as studentDescription', 'users.studyProgram as studyProgram','bookings.id_student as id_student', 'bookings.id_booking as id_booking')
        ->where('id_student', '!=', null)  
        ->where('companies.id_company', '=', $id_company)     
        ->where('bookings.id_event', '=', $id_event)       
        ->get();

        return view('adminPages.show_students', ['company'=> $company, 'companystudents' =>$companystudents])->withEvent($event);
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
    public function show($id)
    {
        //
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
