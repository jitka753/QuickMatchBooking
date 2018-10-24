<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\TimeSlot;
use App\CompanyEvent;


class EventAdminController extends Controller
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
        $timeslots = TimeSlot::all();
        $eventStartDropDown = TimeSlot::pluck('time_slot_value', 'id_time_slot');
        $eventEndDropDown = TimeSlot::pluck('time_slot_value', 'id_time_slot');

        return view('adminPages.addevent', ['eventStartDropDown'=> $eventStartDropDown, 'eventEndDropDown' => $eventEndDropDown]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'eventName' => 'required',
                'eventDate' => 'required',
                'eventDescription' => 'required',
                'eventAddress' => 'required',
                'eventResPerson' => 'required',
                'eventPhoneRP' => 'required',
                'eventEmailRP' => 'required',
            ]);

            //create event
            $event = new Event;
            $event->eventName=$request->input('eventName');
            $event->eventDate=$request->input('eventDate');
            $event->eventDescription=$request->input('eventDescription');
            $event->eventAddress=$request->input('eventAddress');
            $event->eventTimeStart=$request->input('eventTimeStart');
            $event->eventTimeEnd=$request->input('eventTimeEnd');
            $event->eventWebLink=$request->input('eventWebLink');
            $event->eventResPerson=$request->input('eventResPerson');
            $event->eventPhoneRP=$request->input('eventPhoneRP');
            $event->eventEmailRP=$request->input('eventEmailRP');
            $event->timeSlotDuration=$request->input('timeSlotDuration');
            $event->save();

            return redirect('/addevent')->with('success', 'Event created');
       


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_event)
    {
        $id_event = Event::find($id_event);
        $timeslots = TimeSlot::all();
        $eventStartDropDown = TimeSlot::pluck('time_slot_value', 'id_time_slot');
        $eventEndDropDown = TimeSlot::pluck('time_slot_value', 'id_time_slot');
        return view('adminPages.edit_event', ['id_event' => $id_event])->withEventStartDropDown($eventStartDropDown)->withEventEndDropDown($eventEndDropDown);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_event)
    {
        $event = Event::find($id_event);
        $event->eventName=$request->input('eventName');
        $event->eventDate=$request->input('eventDate');
        $event->eventDescription=$request->input('eventDescription');
        $event->eventAddress=$request->input('eventAddress');
        $event->eventTimeStart=$request->input('eventTimeStart');
        $event->eventTimeEnd=$request->input('eventTimeEnd');
        $event->eventWebLink=$request->input('eventWebLink');
        $event->eventResPerson=$request->input('eventResPerson');
        $event->eventPhoneRP=$request->input('eventPhoneRP');
        $event->eventEmailRP=$request->input('eventEmailRP');
        $event->timeSlotDuration=$request->input('timeSlotDuration');
        $event->save();

        return redirect('/admin')->with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_event)
    {
        $event = Event::find($id_event);
        $companyevent = CompanyEvent::all();
        $included = CompanyEvent::where('id_event', $id_event)->first();

        if($included) {
            return back()->with('error', 'There are companies assigned to this event, you have to remove the companies before deleting this event');
       
        }else{
            $event->delete();
        return redirect('/admin')->with('success', 'Event removed');
        }
    }
}
