@extends('layouts.appAdmin')

@section('content')
<a href="/admin" class="btn btn-primary" role="button">Go Back</a>
<h1>Add New Event</h1>
<div class="container">
{!! Form::open(['action' => 'EventAdminController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <!-- event name-->
    <div class="form-group">
        <label>Event Name*</label>
        {{Form::text('eventName', '', ['class' =>'form-control', 'placeholder' => 'Enter event name'])}}
    </div>


    <!-- event date-->
    <div class="form-group">
            <label for="eventDate">Event Date*</label>
            {{Form::date('eventDate', '', ['class' =>'form-control', 'placeholder' => 'Enter event date'])}}
    </div>

    <div class="row">
   <!-- start time at at-->
   <div class="form-group row">
        <label class="col-6 col-form-label text-md-right">Event starts at:*</label>
        <div class="col-md-6">
        {{Form::select('eventTimeStart', $eventStartDropDown) }}
    </div>
</div>

    <!-- end time  at-->
    <div class="form-group row">
        <label for="eventTimeEnd" class="col-6 col-form-label text-md-right">Event ends at:*</label>
        <div class="col-md-6">
        {{Form::select('eventTimeEnd', $eventEndDropDown) }}
    </div>
</div>
</div>

    <!-- event address-->
    <div class="form-group">
        <label>Event Address*</label>
        {{Form::text('eventAddress', '', ['class' =>'form-control', 'placeholder' => 'Enter event address'])}}
    </div>
  

    <!-- event description -->
    <div class="form-group">
            <label for="companyDescription">Event Description*</label>
            {{Form::textarea('eventDescription', '', ['class' =>'form-control', 'placeholder' => 'Describe the event'])}}
    </div>

     <!-- event website-->
     <div class="form-group">
            <label>Event Website*</label>
            {{Form::text('eventWebLink', '', ['class' =>'form-control', 'placeholder' => 'Enter event website'])}}
    </div>

     <!-- event responsible person name-->
     <div class="form-group">
            <label>Responsible Person Name*</label>
            {{Form::text('eventResPerson', '', ['class' =>'form-control', 'placeholder' => 'Enter name of responsible person'])}}
    </div>

     <!-- event responsible person phone-->
     <div class="form-group">
            <label>Responsible Person Phone*</label>
            {{Form::text('eventPhoneRP', '', ['class' =>'form-control', 'placeholder' => 'Example: +45 91 19 16 90'])}}
    </div>

     <!-- event responsible person email-->
     <div class="form-group">
            <label>Responsible person email*</label>
            {{Form::text('eventEmailRP', '', ['class' =>'form-control', 'placeholder' => 'Enter email of responsible person'])}}
    </div>


    <div>
    <small>*Required fields</small>
    </div>
 <!-- submit and close form-->
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