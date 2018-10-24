@extends('layouts.appAdmin')

@section('content')

<!-- <h1>Sign Company For The Event</h1> -->
<div class="container">
        <a href="/admin" class="btn btn-primary" role="button">Go Back</a>
        <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Sign Company For The Event</div>
                <div class="card-body">
                    <!-- select company from dropdown-->
                    {!! Form::open(['action' => 'CompanyEventController@store', 'method' => 'POST', 'enctype' =>
                    'multipart/form-data']) !!}

                    <!-- event drop down-->
                <div class="form-group row">
                    <label class="col-md-5 col-form-label text-md-right">Select event: </label>
                     <div class="col-md-6">
                    {{Form::select('id_event', $eventsDropDown) }}
                </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-md-right">Select company: </label>
                        <div class="col-md-6">
                        {{Form::select('id_company', $companiesDropDown) }}
                    </div>
                </div>

                    <!-- first meeting at-->
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-md-right">Company will be available from:*</label>
                        <div class="col-md-6">
                        {{Form::select('companyEventTimeStart', $timeStartDropDown) }}
                    </div>
                </div>

                    <!-- last meeting at-->
                    <div class="form-group row">
                        <label for="companyEventTimeEnd" class="col-md-5 col-form-label text-md-right">Company will be available until:*</label>
                        <div class="col-md-6">
                        {{Form::select('companyEventTimeEnd', $timeEndDropDown) }}
                    </div>
                </div>

                    <!-- internship description -->
                    <div class="form-group">
                        <label for="internshipDescription" class="col-md-5 col-form-label text-md-right">Internship Description:*</label>
                  
                        {{Form::textarea('internshipDescription', '', ['class' =>'form-control', 'placeholder' =>
                        'Describe the internship'])}}
                    </div>
            

                    <!--virtual/face to face -->
                    <div class="form-group row">
                        <label for="virtual_meeting" class="col-md-5 col-form-label text-md-right">Face-to-Face or Virtual (e.g. Skype) meetings:*</label>
                        <div class="col-md-6">
                        {{Form::select('virtual_meeting', array('0' => 'Face-to-Face meetings', '1' => 'Virtual
                        meetings'))}}
                    </div>
                </div>

                    <!--danish/international/student -->
                    <div class="form-group row">
                        <label for="virtual_meeting" class="col-md-5 col-form-label text-md-right">Target students:*</label>
                        <div class="col-md-6">
                        {{Form::select('danish_international', array('dan_int' => 'Both danish and international
                        students', 'dan' => 'Only Danish students', 'int' => 'Only international students'))}}
                    </div>
                </div>

                <!-- company responsible person phone-->
     <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right">Study field(s):*</label>
            <div class="col-md-6">
            {{Form::text('study_field', '', ['class' =>'form-control', 'placeholder' => 'Example: Computer Science, marketing etc.'])}}
    </div>
</div>

                    <div class="col-md-6 offset-md-4">
                    <div>
                        <small>*Required fields</small>
                    </div>
                    <!-- submit and close form-->
                   
                    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
                    @endsection
