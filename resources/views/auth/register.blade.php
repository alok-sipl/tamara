@extends('layouts.admin-without-login-master')
@section('content')
<div class="container">
    <div class="row">
        <div class="server-message">
            @if(Session::get('alert_msg'))
                <span class="server-alert-msg">{!! Session::get('alert_msg') !!}</span>
            @endif
            @if(Session::get('success_msg'))
                <span class="server-success-msg">{!! Session::get('success_msg') !!}</span>
            @endif
            @if(Session::get('error_msg'))
                <span class="server-error-msg">{!! Session::get('error_msg') !!}</span>
            @endif
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registration</div>

                <div class="panel-body">
                    {!! Form::model('', ['url' => route('register'), 'method' => 'POST', 'id' => 'signup_form', 'data-parsley-validate' => true, 'class' => 'form-horizontal form-submit', 'data-parsley-validate novalidate' => "", 'autocomplete' => "off"]) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('short_code') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Short Code*</label>

                            <div class="col-md-6">
                                {!! Form::text('short_code', old('short_code'), [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                                'data-parsley-maxlength'=> 30,
                                'data-parsley-required-message' => 'Please enter short code',
                                'data-parsley-maxlength-message'=> 'Short code can be max 30 characters long'

                                ]) !!}
                                @if ($errors->has('short_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('short_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full Name*</label>

                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                                'data-parsley-minlength'=> 2,
                                'data-parsley-maxlength'=> 30,
                                'data-parsley-required-message' => 'Please enter first name',
                                'data-parsley-minlength-message'=> 'Full name can be minimum 2 characters long',
                                'data-parsley-maxlength-message'=> 'Full name can be max 30 characters long'

                                ]) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address*</label>

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), [
                                'class' => 'form-control',
                                'autofocus',
                                'required',
                                'data-parsley-type' => "email",
                                'data-parsley-type-message' => 'Email address is invalid',
                                'data-parsley-required-message' => 'Please enter email address',
                                ]) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                        {{--<label for="email" class="col-md-4 control-label">Password</label>--}}

                        {{--<div class="col-md-6">--}}
                            {{--{!! Form::password('password', [--}}
                            {{--'class' => 'form-control',--}}
                            {{--'autofocus',--}}
                            {{--'required',--}}
                            {{--]) !!}--}}

                            {{--@if ($errors->has('password'))--}}
                                {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Phone Number*</label>

                            <div class="col-md-6">
                                {!! Form::text('phone_number',  old('phone_number'), [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                                'data-parsley-required-message' => 'Please enter phone number',
                                'data-parsley-minlength'=> 10,
                                'data-parsley-maxlength'=> 13,
                                'data-parsley-minlength-message'=> 'Phone number can be minimum 10 digit long',
                                'data-parsley-maxlength-message'=> 'Phone number can be max 13 digit long'

                                ]) !!}

                            @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">User Type*</label>

                            <div class="col-md-6">
                                {{ Form::select('user_type', \Config::get('constant.USER_TYPE'),  old('user_type'), ['class' => 'form-control', 'required', 'data-parsley-required-message' => 'Please select user type']) }}

                            @if ($errors->has('user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
