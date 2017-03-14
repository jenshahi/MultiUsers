@extends('layouts.app')
@section('title', 'Add New User')
@section('content')

    <form class="form-horizontal" method="post" href="{{'/addusers'}}" >
        {!! csrf_field() !!}
        @if($message= Session::get('success'))
            <div class="alert alert-success">
                <p>
                    {{$message}}
                </p>
            </div>
        @endif
        <div class="form-group">
            <label for="inputName4" class="col-sm-2 control-label">User's Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Name">{{($errors->has('name')) ? $errors->first('name'):'' }}
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail4" class="col-sm-2 control-label">User's Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" placeholder="Email">{{($errors->has('email')) ? $errors->first('email'):'' }}
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">User's Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="Password">{{($errors->has('password')) ? $errors->first('password'):'' }}
            </div>
        </div>
        <div class="form-group">
            <label for="inputRole4" class="col-sm-2 control-label">User's Role</label>
            <div class="col-sm-10">
                <select class="form-control" name="role" id="role">
                    @foreach($roles as $role){
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Add New User</button>
            </div>
        </div>
    </form>

@endsection
