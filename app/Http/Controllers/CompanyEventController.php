<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Company;
use App\CompanyEvent;
use App\TimeSlot;
use App\Event;

class CompanyEventController extends Controller
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
        $companies = Company::all();
        $companiesDropDown = Company::pluck('companyName', 'id_company');

        $events = Event::all();
        $eventsDropDown = Event::pluck('eventName', 'id_event');

        $timeslots = TimeSlot::all();
        $timeStartDropDown = TimeSlot::pluck('time_slot_value', 'id_time_slot');
        $timeEndDropDown = TimeSlot::pluck('time_slot_value', 'id_time_slot');

        return view('adminPages.companyevent' , [ 'eventsDropDown' => $eventsDropDown,'companiesDropDown' => $companiesDropDown, 'timeStartDropDown' => $timeStartDropDown, 'timeEndDropDown' => $timeEndDropDown ]);
    }

   
    public function store(Request $request)
    {
      //  $id_company = DB::select('SELECT id_company from company_events');

      //  $count = CompanyEvent::where('id_company', $id_company)->count();


      ///  if($count == 0)
      //  {
        $id = DB::table('company_events')->select('id_company')->where('id_company', $request->id_company)->count(); 
        //$id = CompanyEvent::where('id_company', '=', Input::get('id_company'))->first();
        if ($id === null) {
        $companyevent = new CompanyEvent;
        $companyevent->id_company=$request->input('id_company');
        $companyevent->id_event=$request->input('id_event');
        $companyevent->companyEventTimeStart=$request->input('companyEventTimeStart');
        $companyevent->companyEventTimeEnd=$request->input('companyEventTimeEnd');
        $companyevent->internshipDescription=$request->input('internshipDescription');
        $companyevent->virtual_meeting=$request->input('virtual_meeting');
        $companyevent->danish_international=$request->input('danish_international');
        $companyevent->study_field=$request->input('study_field');
        $companyevent->save();

        return redirect('/companyevent')->with('success', 'Company signed for the event.');
        }else {
            return back()->with('error', 'Company is already assigned to this event.');
        }
    }
}
