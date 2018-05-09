@extends('layouts.app')@section('content')<div class="normalheader transition animated fadeIn">    <div class="hpanel">        <div class="panel-body">            <div class="row">                <div class="col-md-6">                    <h2 class="font-light m-b-xs">                        Bulk Upload Users                    </h2>                    <div id="hbreadcrumb">                        <ol class="hbreadcrumb breadcrumb">                            <li><a href="{{ url("admin/dashboard") }}">Dashboard</a></li>                            <li class="active">                                <span>Bulk Upload</span>                            </li>                        </ol>                    </div>                </div>            </div>        </div>    </div></div><div class="row">    <div class="col-md-12">        <div class="hpanel">            <div class="panel-body">                @if(isset($user) && count($user) > 0)                {!! Form::model($user, ['url' => URL::route('user.update', $user->id), 'method' => 'PUT', 'id' => 'user_form', 'data-parsley-validate' => true, 'class' => 'form-horizontal']) !!}                @else                {!! Form::open(['url' => URL::route('user.store'), 'method' => 'POST', 'id' => 'user_form', 'data-parsley-validate' => true, 'class' => 'form-horizontal']) !!}                @endif                    <div class="form-group">                        <div class="col-md-6 col-md-offset-4">                            <a href="{{ asset('files/demo.csv') }}" download>Download Sample CSV File</a>                        </div>                    </div>                    <div class="form-group{{ $errors->has('short_code') ? ' has-error' : '' }}">                        <label for="name" class="col-md-4 control-label">Upload CSV File</label>                        <div class="col-md-6">                            {!! Form::file('user', [                            'class' => 'form-control',                            'required',                            "accept" => ".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel",                            'data-parsley-max-file-size'=>"20",                            'data-parsley-file-mime-types'=> "text/csv",                            'autofocus',                            'data-parsley-required-message' => 'Please select file',                            ]) !!}                            @if ($errors->has('code'))                                <span class="help-block">                                        <strong>{{ $errors->first('code') }}</strong>                                    </span>                            @endif                        </div>                    </div>                    <div class="form-group">                        <div class="col-md-6 col-md-offset-4">                            <button type="submit" class="btn btn-primary">                                Upload File                            </button>                        </div>                    </div>                {!! Form::close() !!}            </div>        </div>    </div></div>@endsection