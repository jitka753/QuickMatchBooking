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


class BookingsController extends Controller
{


    //authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id_event)
    {
    
        //fetch companies that are participating on the event
        $companies = DB::table('companies')
                ->join('company_events', function($join)
                    {
                        $join->on('companies.id_company', '=', 'company_events.id_company');
                           // show only available time
                    })
                        ->get();

        //big table from which we display available time-slots for each company
        $time_slots = DB::table('companies')
                        ->join('bookings', 'companies.id_company', '=', 'bookings.id_company')
                        ->join('time_slots', 'bookings.id_time_slot', '=', 'time_slots.id_time_slot')
                        ->select('time_slots.*', 'time_slots.id_time_slot as id_time_slot', 'companies.id_company as id_company', 'bookings.id_student as id_student', 'bookings.id_booking as id_booking')
                        ->where('id_student', '=', null)    
                        ->get();

       //fetch events - to be displayed in the drop down
        $events = Event::all();
        $eventsDropDown = Event::pluck('eventName', 'id_event');
      
        
        
        
        //We get all the companies
         $comps = Company::all();

         //We create a blank array
         $array_comp_ids = array();
         $array_times = array();
 
         //We take the companies list one by one
         foreach($comps as $comp)
         {
             //We fill our empty array with the ids of the companies
             $array_comp_ids[] = $comp->id_company;
         }
 
         //We are parsing that array with ids
         foreach($array_comp_ids as $comp_id)
         {
             //We just take that row if it exists
             $book = Booking::where('id_company', $comp_id)->where('id_student', Auth::id())->first();
 
             $array_times[$comp_id] = array();
 
             if($book)
             {
                 $time = TimeSlot::where('id_time_slot', $book->id_time_slot)->first();
 
                 $array_times[$comp_id]['booking'] = $book->id_booking;
 
                 $array_times[$comp_id]['timeslot'] = substr($time->time_slot_value, 0, 5);
 
             }else{
 
                 $array_times[$comp_id]['booking'] = 0;
 
                 $array_times[$comp_id]['timeslot'] = 0;
 
             }
         }

        return view('pages.mybooking', [ 'eventsDropDown' => $eventsDropDown , 'companies' => $companies, 'time_slots' => $time_slots, 'company_time' => $array_times]);
    
    }

    //student can cancel any of his bookings
    public function cancelBooking(Booking $booking) {

        //$booking = Booking::where('id_booking', $id);

        if(Auth::id() == $booking->id_student)
        {
            $booking->id_student = NULL;

            $booking->save();

            return back()->with('error', 'Booking was canceled');
        }else{

            return back()->with('danger', 'This is not your booking!');

        }

    }


       //instead of save bookings - bookings that student submits update in the table bookings with student ID (initially id_student = null)
            public function updateBooking(Request $request)
            {
        
                $inputs = $request->all();
               
                /**
                 * This is how you request just one input from the view
                 *  $request->get('id');
                 */
                

                 //get timeslots
            $array = array();

            $my_time_slots = Booking::where('id_student', Auth::id())->get();

            $array_time_slots = array();
                                    
            foreach($my_time_slots as $my_time_slot)
            {
                $array_time_slots[] = $my_time_slot->id_time_slot;
            }

                //get event id
                $array = array();

                $my_events = Booking::where('id_student', Auth::id())->get();
    
                $array_events = array();
                                        
                foreach($my_events as $my_event)
                {
                    $array_events[] = $my_event->id_event;
                }


        
          foreach ($inputs as $key => $value) {
                 if (strpos($key, 'company_') !== false) {
                     if ($value != NULL) {
                         $array[$key] = $value;
                     }
                 }
             }
             foreach ($array as $key => $value)
             {
                 $company_id = str_replace('company_', '', $key);
                    
                $count = Booking::where('id_company', $company_id)->where('id_student', Auth::id())->count();
                $timeslot_validation = Booking::where('id_event', $value)->where('id_time_slot', $value)->where('id_student', Auth::id())->first();
            
        
                 if($count == 0)  {
                        
                    $booking = Booking::where('id_booking', $value)->first();
        
                    if(!in_array($booking->id_time_slot, $array_time_slots)) {

                        if($booking->id_student == NULL)
                        {
                            $booking->id_student = auth()->user()->id;
           
                            $booking->save();
                        }

                     
                    } 
                    else{
                        return back()->with('error', 'One or more selected interviews were not possible to book. Have you tried to book single time slot for more than one company? If not, try to reload the page, the availability of the interviews you have selected might have changed.');
                    }

                } 

               
           
            }
            return back()->with('success', 'Booking created');
          
        }


    }
        
        
        
            
     
    


