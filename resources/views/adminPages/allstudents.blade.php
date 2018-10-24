@extends('layouts.appAdmin')

@section('content')
<a href="/admin" class="btn btn-primary" role="button">Go Back</a>
<h1>All Students</h1>
@if(count($students) >0) 
    <table id="printable" class="table table-bordered">
        <thead>
          <tr>
                @php 
                $number_row=1;
                @endphp
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

          </tr>
        </thead>
        <tbody>
          <tr>
             @foreach($students as $student)
            <th scope="row">{{$number_row}}</th>
            @php 
            $name = ($student->name). ' ' . ($student->studentLastName);
            @endphp
          <td><a href="student_bookings/{{$student->id}}/{{$idevent}}">{{$name}}</a></td>
          <td>{{$student->email}}</td>
          @php 
          $number_row++;
          @endphp
          </tr>
          @endforeach
        </tbody>
    </table>
    @endif

    <br><br>

    <a href="javascript:window.print()">Print</a>
@endsection