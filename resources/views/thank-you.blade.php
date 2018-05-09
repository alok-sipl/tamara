@extends('layouts.admin-without-login-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thank You</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <span>{{ $message }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
