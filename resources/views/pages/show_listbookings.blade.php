 @extends('layouts.app')

@section('content')
<h1 class="text-center">{{$eventName}} event</h1>
<h3 class="text-center">List of {{Auth::user()->name}} {{Auth::user()->studentLastName}}'s bookings</h3>
    @if(count($time_slots) >0) 
    <table id="printable" class="table table-bordered">
        <thead>
          <tr>
                @php 
                $number_row=1;
                @endphp
            <th scope="col"></th>
            <th scope="col">Booked Time</th>
            <th scope="col">Round</th>
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
          <td>Round {{$timeslot->id_time_slot}}</td>
          <td>{{$timeslot->companyName}}</td>
          @php 
          $number_row++;
          @endphp
          </tr>
          @endforeach
        </tbody>
    </table>
    @endif

    <br><br>

    <a role="button" class="btn btn-primary" href="javascript:window.print()">Print</a>
@endsection 

{{-- Hello
@foreach($time_slots as $timeslot)
{{$timeslot->companyName}}
@endforeach --}}
