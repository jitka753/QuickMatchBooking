@extends('layouts.appAdmin')

@section('content')
    <h1>Welcome, {{Auth::user()->name}}</h1>
  
          <div class="card">
              <h5 class="card-header">Company <a href="addcompany" class="pull-right btn btn-outline-success">Add Company</a></h5>
              <div class="card-body">
                 
                  <a href="allcompanies" class="btn btn-outline-primary">All companies</a>
                  <a href="companyevent" class="btn btn-outline-primary">Sign Company To Event</a>
                  <a href="removecompanyevent" class="btn btn-outline-primary">Remove Company From an Event</a>
              </div>
            </div>
<br>
            <div class="card">
                <h5 class="card-header">Event <a href="addevent" class="pull-right btn btn-outline-success">Add Event</a></h5>
                <div class="card-body">
                    @foreach($events as $event)
                  <h5 class="card-title">{{$event->eventName}}</h5>
                  <h5>{{$event->eventDate->format('d/m/Y')}}</h5>
                  <p class="card-text">{{$event->eventDescription}}</p>
            <a href="/addevent/{{$event->id_event}}/edit" class="btn btn-outline-warning">Edit event</a>
            {!!Form::open(['action' => ['EventAdminController@destroy', $event->id_event], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
        {!!Form::close()!!}

                     <a href="allstudents/{{$event->id_event}}" class="btn btn-outline-primary">All students</a>
                   <a href="companystudent/{{$event->id_event}}" class="btn btn-outline-primary">Company-participant lists</a>
                  <hr>
                @endforeach

                </div>
              </div>
<br>
              <div class="card">
                  <h5 class="card-header">Participant</h5>
                  <div class="card-body">
                      <a href="allstudents" class="btn btn-outline-primary">All participants</a>
                  </div>
                </div>
        
    <br>
    <br>
          
    
@endsection
