@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>ADMIN DASHBOARD</h1>
                    You are logged in! <br/>
                    HI {!!  Auth::user()->name!!} <br/>
                    Admin Status = {{Auth::user()->isadmin}} <hr/>
                    <a class="btn btn-primary" href="/showusers">Show Users</a><hr/>
                    <a class="btn btn-success" href="/addusers">Create Users</a><hr/>
                    <a class="btn btn-primary" href="/usersreport">Show Users Login</a><hr/>
                    <a class="btn btn-primary" href="/report">Create Report</a><hr/>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
