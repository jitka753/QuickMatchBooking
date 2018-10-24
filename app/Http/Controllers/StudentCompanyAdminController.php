<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\CompanyEvent;
use App\Booking;
use App\TimeSlot;
use App\Company;

class StudentCompanyAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index($id_event)
    {
        $idevent = $id_event;
        $companies = DB::table('companies')
        ->join('company_events','company_events.id_company', '=', 'companies.id_company')
        ->where('company_events.id_event', '=', $id_event)
        ->get();

        $companystudents = DB::table('companies')
        ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
        ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
        ->leftJoin('users', 'bookings.id_student', '=', 'users.id')
        ->select('time_slots.*', 'companies.id_company as id_company', 'companies.companyName as companyName', 'users.name as studentName','bookings.id_student as id_student', 'bookings.id_booking as id_booking')
        ->where('id_student', '=', null)              
        ->get();


        return view('adminPages.companystudent', [ 'companystudents' => $companystudents, 'companies' => $companies ])->withIdevent($idevent);
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

    public function show($id_company)
    {
        $company = Company::find($id_company);

        
        $companystudents = DB::table('companies')
        ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
        ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
        ->join('users', 'bookings.id_student', '=', 'users.id')
        ->select('time_slots.*', 'time_slots.time_slot_value as time_slot_value', 'companies.id_company as id_company', 'companies.companyName as companyName', 
        'users.name as firstName', 'users.studentLastName as lastName', 'users.studentDescription as studentDescription', 'users.studyProgram as studyProgram','bookings.id_student as id_student', 'bookings.id_booking as id_booking')
        ->where('id_student', '!=', null)              
        ->get();

        return view('adminPages.show_students', ['company'=> $company, 'companystudents' =>$companystudents]);
    }

 
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
