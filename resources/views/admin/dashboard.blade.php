@extends('layouts.app')

@section('content')
    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="font-light m-b-xs">
                            Dashboard
                        </h2>
                        <div id="hbreadcrumb">
                            <ol class="hbreadcrumb breadcrumb">
                                <li class="active">
                                    <span>Dashboard</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="hpanel">
                <div class="panel-body text-center h-200">
                    <i class="pe-7s-graph1 fa-4x"></i>
                    <h1 class="m-xs">2</h1>
                    <h3 class="font-extra-bold no-margins text-success">
                        Total Users
                    </h3>
                    <small><a  href="{{ url("admin/users") }}">View Details</a></small>
                </div>
                <div class="panel-footer">
                    This is standard panel footer
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="hpanel">
                <div class="panel-body text-center h-200">
                    <i class="pe-7s-graph1 fa-4x"></i>
                    <h1 class="m-xs">$1 206,90</h1>
                    <h3 class="font-extra-bold no-margins text-success">
                        Total Revenue
                    </h3>
                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum.</small>
                </div>
                <div class="panel-footer">
                    <a  href="{{ url("admin/revenue") }}">View Details</a>
                </div>
            </div>
        </div>
    </div>
@endsection

