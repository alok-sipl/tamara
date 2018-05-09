@extends('layouts.admin-without-login-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                        {!! Form::model('', ['url' => route('login'), 'method' => 'POST', 'id' => 'login_form', 'data-parsley-validate' => true, 'class' => 'form-horizontal form-submit', 'data-parsley-validate novalidate' => "", 'autocomplete' => "off"]) !!}
                        {{ csrf_field() }}

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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password*</label>
                            <div class="col-md-6">
                                {!! Form::password('password',  [
                                'class' => 'form-control',
                                'required',
                                'autofocus',
                                'data-parsley-required-message' => 'Please enter password',
                                'data-parsley-minlength'=> 6,
                                'data-parsley-maxlength'=> 16,
                                'data-parsley-minlength-message'=> 'Password can be minimum 6 characters long',
                                'data-parsley-maxlength-message'=> 'Password can be max 20 characters long'

                                ]) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
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
