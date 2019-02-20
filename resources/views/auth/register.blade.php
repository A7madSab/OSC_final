@extends('layouts.app')

@section('content')

<link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">

<div class="row">
    <div class="bg col-lg-8 col-sm-8 col-xs-12">
        <img class="bgImg" src="./images/bg11.jpg">
    </div>
    <div class="signupForm col-lg-4 col-sm-8 col-xs-12">
        <h2 style="text-align: center; margin-top: 10%; margin-bottom: 20px; font-weight: bold;">Sign Up</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{ __('Your Name') }}</label>
                <input id="name" type="text" placeholder="Your Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-lg-6 form-group">
                    <label id="university" type="name" id="university">University</label>

                    <select class="form-control" name="selectUniversity">
                        {{-- <option selected disabled>--Select--</option>
                        <option value="cairo">Cairo</option>
                        <option value="ainshams">Ain Shams</option>
                        <option value="helwaan">Helwaan</option> --}}
                        
                        @foreach( $var as $v)
                        {
                            <option value={{ $v->University_name }}>{{ $v->University_name }}</option>
                        }
                        @endforeach

                    </select>
                </div>

                <div class="col-lg-6 form-group">
                    <label id="faculty" type="name" id="faculty">Faculty</label>
                    <select class="form-control" name="faculty">
                        <option selected disabled>--Select--</option>
                        <option value="engineering">Engineering</option>
                        <option value="cis">Computer & Information Science</option>
                        <option value="commerce">Commerce</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-lg-6">
                    <input type="radio" name="gender" value="male"> Male
                </div>
                <div class="col-lg-6">
                    <input type="radio" name="gender" value="female"> Female
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" placeholder="Enter E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" type="password" placeholder="Enter Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="">
                    <input id="password-confirm" type="password" placeholder="Retype Password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #0097a7; width: 100%;">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</div>


<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
