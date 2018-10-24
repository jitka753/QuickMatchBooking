@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register As Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name*</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="First name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <!-- last name-->
                          <div class="form-group row">
                                <label for="studentLastName" class="col-md-4 col-form-label text-md-right">Last Name*</label>
    
                                <div class="col-md-6">
                                    <!-- placeholder=".............." is the text in background of input box  -->
                                    <input id="studentLastName" placeholder="Last name" type="text" class="form-control{{ $errors->has('studentLastName') ? ' is-invalid' : '' }}" name="studentLastName" value="{{ old('studentLastName') }}" required>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address*') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Only UCN email (xxx@ucn.dk)" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Repeat password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="1">
                        <!--phone -->
                            <div class="form-group row">
                                <label for="studentMobile" class="col-md-4 col-form-label text-md-right">Mobile</label>
    
                                <div class="col-md-6">
                                    <input placeholder="Example: +45 12 34 56 78 " id="studentMobile" type="text" class="form-control" name="studentMobile" required>
                                </div>
                            </div>

                             <!--study program -->
                             <div class="form-group row">
                                    <label for="studentPhone" class="col-md-4 col-form-label text-md-right">Select your study program:*</label>                                   
                                        <div class="column col-6 col-sm-4">
                                            <input type="radio" name="studyProgram" id="studyProgram" value="Computer Science">Computer Science<br>
                                            <input type="radio" name="studyProgram" id="studyProgram" value="Design, Technology">IT Technology<br>
                                            <input type="radio" name="studyProgram" id="studyProgram" value="Digital Concept">Digital Concept<br>
                                            <input type="radio" name="studyProgram" id="studyProgram" value="Multimedia Design">Multimedia Design<br>
                                        </div>
                                <div class="column col-6 col-sm-4">
                                        <input type="radio" name="studyProgram" id="studyProgram" value="Software Development">Software Development<br>
                                        <input type="radio" name="studyProgram" id="studyProgram" value="Web Development">Web Development<br>
                                        <input type="radio" name="studyProgram" id="studyProgram" value="Marketing Management">Graphic Design<br>
                                        <input type="radio" name="studyProgram" id="studyProgram" value="Other">Other<br>                                
                                </div>
                             </div>


                          <!--portfolio link -->
                         <div class="form-group row">
                                <label for="studentPortfolioLink" class="col-md-4 col-form-label text-md-right">Portfolio Link</label>
    
                                <div class="col-md-6">
                                    <input id="studentPortfolioLink" placeholder="GitHub or personal website link." type="text" class="form-control" name="studentPortfolioLink">
                                </div>
                            </div>

                         <!--description
                        <div class="form-group row">
                                <label for="studentDescription" class="col-md-4 col-form-label text-md-right">Why should company choose you?</label>
    
                                <div class="col-md-6">
                                    <input id="studentDescription" type="text" class="form-control" name="studentDescription" required>
                                </div>
                            </div> -->

                            <div class="form-group">
                            <label for="studentDescription" class="">Why should company choose you?*</label>           
                                {{Form::textarea('studentDescription', '', ['id' =>'article-ckeditor', 'class' =>'form-control', 'placeholder' => 'Describe, why should company choose you.'])}}                       
                            </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <small>*Required fields</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
