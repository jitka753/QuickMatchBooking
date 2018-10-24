@extends('layouts.appAdmin')

@section('content')
<a href="/allcompanies" class="btn btn-primary" role="button">Go Back</a>
    <h1>{{$company->companyName}}</h1>
    <br><br>
    <div>
        <table id="printable" class="table table-bordered">
<thead>
<tr>
    <th>Email</th>
    <th> Phone</th>
    <th>Mobile</th>
    <th>Address</th>
    <th>Email</th>
</tr>
</thead>
<tbody>
    <tr>
       <td> {!!$company->companyEmail!!}</td>
        <td>{!!$company->companyPhone!!}</td>
       <td> {!!$company->companyEmail!!}</td>
      <td> {!!$company->companyAddress!!}</td>
       <td>{!!$company->companyWebLink!!}</td>
    </tr>
</tbody>
    </table>
    <hr>
        <h3>Description: </h3>
        <p>{!!$company->companyDescription!!}</p>
    </div>
    <hr>
    <table id="printable" class="table table-bordered">
            <thead>
            <tr>
                <th><small>Responsible person</small></th>
                <th><small>Responsible person phone</small></th>
                <th><small>Responsible person email</small></th>
            </tr>
            </thead>
            <tbody>
                <tr>
   <td> <small>{{$company->companyResPerson}}</small></td>
   <td> <small>{{$company->companyPhoneRP}}</small></td>
    <td><small>{{$company->companyEmailRP}}</small></td></tr>
        </tbody>
    </table>
    <hr>
            <a href="/allcompanies/{{$company->id_company}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['AllCompaniesController@destroy', $company->id_company], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
@endsection