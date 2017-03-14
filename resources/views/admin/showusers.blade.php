@extends('layouts.app')
@section('title', 'All Users')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead class="table table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>isAdmin</th>
                    <th>Role</th>
                <tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <form method="POST" action="usermgmt">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}} <input type="hidden" name="email" value="{{$user->email}}"></td>
                            <td>{{$user->isadmin}}</td>
                            <td>{{$user->roles()->first()->name}}</td>
                            {{--<td><input type="checkbox" {{$user->hasRole('Manager') ? 'checked':''}} name="role_manager"></td>--}}
                            {{--<td><input type="checkbox" {{$user->hasRole('Moderator') ? 'checked':''}} name="role_moderator"></td>--}}
                            {{--<td><input type="checkbox" {{$user->hasRole('Editor') ? 'checked':''}} name="role_editor"></td>--}}
                            {{ csrf_field() }}
                            <td><button type="submit" class="btn btn-success btn-sm">Edit User</button> </td>
                            <td><a class="btn btn-danger btn-sm" href="/delete/{{$user->id}}">Delete User</a></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection