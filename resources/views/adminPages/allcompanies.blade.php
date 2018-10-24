@extends('layouts.appAdmin')

@section('content')
<a href="/admin" class="btn btn-primary" role="button">Go Back</a>
    <h1 class="center">All Companies</h1>
    @if(count($companies) >0) 
    <table id="printable" class="table table-bordered">
        <thead>
          <tr>
                @php 
                $number_row=1;
                @endphp
            <th scope="col"></th>
            <th scope="col">Company</th>
          </tr>
        </thead>
        <tbody>
          <tr>
             @foreach($companies as $company)
            <th scope="row">{{$number_row}}</th>
          <td> <h3><a href="allcompanies/{{$company->id_company}}">{{$company->companyName}}</a></h3></td>
          @php 
          $number_row++;
          @endphp
          </tr>
          @endforeach
        </tbody>
    </table>
    @endif

    <br><br>



    <a class="btn btn-primary" role="button" href="javascript:window.print()">Print</a>


@endsection