@extends('layouts.appAdmin')

@section('content')
<a href="/admin" class="btn btn-primary" role="button">Go Back</a>
<h1>Add New Company</h1>
<div class="container">
{!! Form::open(['action' => 'CompanyAdminController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <!-- company name-->
    <div class="form-group">
        <label>Company Name*</label>
        {{Form::text('companyName', '', ['class' =>'form-control', 'placeholder' => 'Enter company name'])}}
    </div>


    <!-- Company email-->
    <div class="form-group">
        <label for="exampleInputEmail1">Company Email Address*</label>
        {{Form::text('companyEmail', '', ['class' =>'form-control', 'placeholder' => 'Enter company email'])}}
    </div>

    <!-- company phone-->
    <div class="form-group">
        <label>Company Phone*</label>
        {{Form::text('companyPhone', '', ['class' =>'form-control', 'placeholder' => 'Enter company phone number. Example: +45 91 19 16 90'])}}
    </div>

    <!-- company mobile-->
    <div class="form-group">
        <label>Company Mobile*</label>
        {{Form::text('companyMobile', '', ['class' =>'form-control', 'placeholder' => 'Enter company mobile number. Example: +45 91 19 16 90'])}}
    </div>

    <!-- company address-->
    <div class="form-group">
        <label>Company Address*</label>
        {{Form::text('companyAddress', '', ['class' =>'form-control', 'placeholder' => 'Enter company address'])}}
    </div>
  

    <!-- company description -->
    <div class="form-group">
            <label for="companyDescription">Company Description*</label>
            {{Form::textarea('companyDescription', '', ['class' =>'form-control', 'placeholder' => 'Describe the company'])}}
    </div>

     <!-- company website-->
     <div class="form-group">
            <label>Company Website*</label>
            {{Form::text('companyWebLink', '', ['class' =>'form-control', 'placeholder' => 'Enter company website'])}}
    </div>

     <!-- company responsible person name-->
     <div class="form-group">
            <label>Responsible Person Name*</label>
            {{Form::text('companyResPerson', '', ['class' =>'form-control', 'placeholder' => 'Enter name of responsible person'])}}
    </div>

     <!-- company responsible person phone-->
     <div class="form-group">
            <label>Responsible Person Phone*</label>
            {{Form::text('companyPhoneRP', '', ['class' =>'form-control', 'placeholder' => 'Example: +45 91 19 16 90'])}}
    </div>

     <!-- company responsible person email-->
     <div class="form-group">
            <label>Responsible person email*</label>
            {{Form::text('companyEmailRP', '', ['class' =>'form-control', 'placeholder' => 'Enter email of responsible person'])}}
    </div>
    <div>
    <small>*Required fields</small>
    </div>

    <!-- submit and close form-->
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<br>
<br>
@endsection
