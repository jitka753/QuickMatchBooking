@extends('layouts.app')

@section('content')
    @section('content')
<h1 class="text-center">Events</h1>
    @if(count($events) >0)
        @foreach($events as $event)


        <div class="list-group">
                <a href="/events/{{$event->id_event}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h3 class="mb-1">{{$event->eventName}}</h3>
                          <h5 >Date: {{$event->eventDate->format('d/m/Y')}}</h5>
                        </div>
                    <p class="mb-1">{{$event->eventDescription}}</p>
                        <small class="text-muted"></small>
                      </a>
            </div>
            @endforeach
    @else
        <p>No events found</p>
    @endif
@endsection