@extends('layouts.appAdmin')

@section('content')
<a href="/admin" class="btn btn-primary" role="button">Go Back</a>
<h1>Edit Event</h1>
<div class="container">
{!! Form::open(['action' => ['EventAdminController@update', $id_event->id_event],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <!-- event name-->
    <div class="form-group">
        <label>Event Name*</label>
    <div>
        <input type="text" name="eventName" style="width: 1000px" value="{{$id_event->eventName}}">
    </div>
    </div>


    <!-- event date-->
    <div class="form-group">
            <label for="eventDate">Event Date*</label>
            <input type="date" name="eventDate" style="width: 1000px" value="{{$id_event->eventDate}}">
    </div>
<div> 
    <p style="color:red">Warning: You have to select Event Start and Event End every time you do the update!!!</p>
</div>

     <div class="row">
    <!-- start time at at-->
   <div class="form-group row">
        <label class="col-6 col-form-label text-md-right" style="color:red">Event starts at:*</label>
        <div class="col-md-6">
        {{Form::select('eventTimeStart', $eventStartDropDown) }}
        </div>
        </div> 

    <!-- end time  at-->
    <div class="form-group row">
        <label for="eventTimeEnd" class="col-6 col-form-label text-md-right" style="color:red">Event ends at:*</label>
        <div class="col-md-6">
        {{Form::select('eventTimeEnd', $eventEndDropDown) }}
    </div>
        </div>
        </div>  

    <!-- event address-->
    <div class="form-group">
        <label>Event Address*</label>
        <input type="text" name="eventAddress" style="width: 1000px" value="{{$id_event->eventAddress}}">
    </div>
  

    <!-- event description -->
    <div class="form-group">
            <label for="companyDescription">Event Description*</label>
            <input type="text" name="eventDescription" style="width: 1000px" value="{{$id_event->eventDescription}}">
    </div>

     <!-- event website-->
     <div class="form-group">
            <label>Event Website*</label>
            <input type="text" name="eventWebLink" style="width: 1000px" value="{{$id_event->eventWebLink}}">
    </div>

     <!-- event responsible person name-->
     <div class="form-group">
            <label>Responsible Person Name*</label>
            <input type="text" name="eventResPerson" style="width: 1000px" value="{{$id_event->eventResPerson}}">
    </div>

     <!-- event responsible person phone-->
     <div class="form-group">
            <label>Responsible Person Phone*</label>
            <input type="text" name="eventPhoneRP" style="width: 1000px" value="{{$id_event->eventPhoneRP}}">
    </div>

     <!-- event responsible person email-->
     <div class="form-group">
            <label>Responsible person email*</label>
            <input type="text" name="eventEmailRP" style="width: 1000px" value="{{$id_event->eventEmailRP}}">
    </div>


    <div>
    <small>*Required fields</small>
    </div>
 <!-- submit and close form-->
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<br>
<br>

<!-- script datepicker-->
<script type="text/javascript">  
    $('.date').datepicker({      
       format: 'mm-dd-yyyy'   
     });      
</script> 

@endsection