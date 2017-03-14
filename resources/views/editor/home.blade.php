@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Editor DASHBOARD</h1>
                    <a href="#">View Page</a><br/>
                    <a href="#">Edit Page</a><br/>
                    <a href="#">Report</a><br/>
                    You are logged in! <br/>
                    HI {!!  Auth::user()->name!!} <br/>
                    Admin Status = {{Auth::user()->isadmin}} <hr/>
                    @foreach($user as $user)
                    MY PARENT: {{$user->name}}
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
