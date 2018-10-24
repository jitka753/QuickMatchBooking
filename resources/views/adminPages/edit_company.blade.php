@extends('layouts.appAdmin')

@section('content')
<a href="/admin" class="btn btn-primary" role="button">Go Back</a>
<h1>Edit Company</h1>
<div class="container">
{!! Form::open(['action' => ['AllCompaniesController@update', $id_company->id_company], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <!-- company name-->
    <div class="form-group">
        <label>Company Name*</label>
        <div>
    <input type="text" name="companyName" style="width: 1000px" value="{{$id_company->companyName}}">
        </div>
    </div>


    <!-- Company email-->
    <div class="form-group">
        <label for="exampleInputEmail1">Company Email Address*</label>
        <div>
        <input type="text" name="companyEmail" style="width: 1000px" value="{{$id_company->companyEmail}}">
        </div>
    </div>

    <!-- company phone-->
    <div class="form-group">
        <label>Company Phone*</label>
        <div>
        <input type="text" name="companyPhone" style="width: 1000px" value="{{$id_company->companyPhone}}">
        </div>
    </div>

    <!-- company mobile-->
    <div class="form-group">
        <label>Company Mobile*</label>
        <div>
        <input type="text" name="companyMobile" style="width: 1000px" value="{{$id_company->companyMobile}}">
        </div>
    </div>

    <!-- company address-->
    <div class="form-group">
        <label>Company Address*</label>
        <div>
        <input type="text" name="companyAddress" style="width: 1000px" value="{{$id_company->companyAddress}}">
        </div>
    </div>
  

    <!-- company description -->
    <div class="form-group">
            <label for="companyDescription">Company Description*</label>
            <div>
            <input type="text" name="companyDescription" style="width: 1000px" value="{{$id_company->companyDescription}}">
            </div>
    </div>

     <!-- company website-->
     <div class="form-group">
            <label>Company Website*</label>
            <div>
            <input type="text" name="companyWebLink" style="width: 1000px" value="{{$id_company->companyWebLink}}">
            </div>
    </div>

     <!-- company responsible person name-->
     <div class="form-group">
            <label>Responsible Person Name*</label>
            <div>
             <input type="text" name="companyResPerson" style="width: 1000px" value="{{$id_company->companyResPerson}}">
            </div>
    </div>

     <!-- company responsible person phone-->
     <div class="form-group">
            <label>Responsible Person Phone*</label>
            <div>
            <input type="text" name="companyPhoneRP" style="width: 1000px" value="{{$id_company->companyPhoneRP}}">
            <div>
    </div>

     <!-- company responsible person email-->
     <div class="form-group">
            <label>Responsible person email*</label>
            <div>
            <input type="text" name="companyEmailRP" style="width: 1000px" value="{{$id_company->companyEmailRP}}">
    </div>
    <div>
    <div>
    <small>*Required fields</small>
    </div>

    <!-- submit and close form-->
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<br>
<br>
@endsection
