@extends('layouts.appAdmin')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary" role="button">Go Back</a>
<h1  class="text-center">{{$company->companyName}}</h1>
<h3  class="text-center">Students that are signed up</h3>

@if(count($companystudents) >0) 
<table id="printable" class="table table-bordered">
    <thead>
      <tr>
            @php 
            $number_row=1;
            @endphp
        <th scope="col">Round</th>
        <th scope="col">Booked Time</th>
        <th scope="col">Name</th>
        <th scope="col">Program</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
         @foreach($companystudents as $companystudent)
        
         @if(($companystudent->id_company) === ($company->id_company))
         @php 
          $fulltime=substr(($companystudent->time_slot_value),0,5);
          $endTime = strtotime("+5 minutes", strtotime($companystudent->time_slot_value)); 
          $name = ($companystudent->lastName). ' ' .($companystudent->firstName);
         @endphp
        <td scope="row">Round {{$companystudent->id_time_slot}}</td>
      <td>{{$fulltime}}</td>
      <td>{{$name}}</td>
      <td>{{$companystudent->studyProgram}}</td>
      <td>{{$companystudent->studentDescription}}</td>
      @php 
      $number_row++;
      @endphp
      </tr>
      @endif
      @endforeach
    </tbody>
</table>

@endif

<br><br>






<a role="button" class="btn btn-primary" href="javascript:window.print()">Print</a>
@endsection