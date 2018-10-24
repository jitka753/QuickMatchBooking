@extends('layouts.app')

@section('content')
    <h1>List of {{Auth::user()->name}} {{Auth::user()->studentLastName}}'s bookings</h1>
    @if(count($time_slots) >0) 
    <table class="table table-bordered">
        <thead>
          <tr>
                @php 
                $number_row=1;
                @endphp
            <th scope="col"></th>
            <th scope="col">Time</th>
            <th scope="col">Company</th>
          </tr>
        </thead>
        <tbody>
          <tr>
             @foreach($time_slots as $timeslot)
             @php 
              $fulltime=substr(($timeslot->time_slot_value),0,5);
              $endTime = strtotime("+5 minutes", strtotime($timeslot->time_slot_value)); 
             @endphp
            <th scope="row">{{$number_row}}</th>
          <td>{{$fulltime}} - {{date('g:i',$endTime)}}</td>
          <td>{{$timeslot->companyName}}</td>
          @php 
          $number_row++;
          @endphp
          </tr>
          @endforeach
        </tbody>
    </table>
    @endif   
@endsection