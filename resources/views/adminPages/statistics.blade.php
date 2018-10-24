@extends('layouts.appAdmin')

@section('content')
    @section('content')
    <h1 class="text-center">Statistics</h1>
    @if(count($events) >0)
        @foreach($events as $event)

        <div class="list-group">
                <a href="/statistics/{{$event->id_event}}" class="list-group-item list-group-item-action flex-column align-items-start">
                          <h3 class="text-center" class="mb-1">{{$event->eventName}}</h3>
                      </a>
            </div>
            @endforeach
    @else
        <p>No events found</p>
    @endif
@endsection