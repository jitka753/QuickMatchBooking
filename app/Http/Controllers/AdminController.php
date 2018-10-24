<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Event;
use App\Bookings;

class AdminController extends Controller
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

        $events =Event::all();
        $students = DB::table('users')->count();

        $companies = DB::table('companies')
           ->join('company_events', 'companies.id_company', '=', 'company_events.id_company')
           ->count();

        $timeslots = DB::table('bookings')->count();

        $available = DB::table('bookings')
            ->where('id_student', '=', NULL)
            ->count();

        $taken = DB::table('bookings')
            ->where('id_student', '!=', NULL)
            ->count();
        
        $percentBooked = (($taken / $timeslots) * 100);
        $percentAvailable = ($available / $timeslots) * 100;


        return view('pages.admin')->withEvents($events)->withStudents($students)->withCompanies($companies)->withTimeslots($timeslots)->withAvailable($available)->withTaken($taken)->withPercentBooked($percentBooked)->withPercentAvailable($percentAvailable);
    }

};