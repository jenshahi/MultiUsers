<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Auth;

class ModeratorController extends Controller
{
    public function index()
    {
        $user = User::all()->where('id',Auth::user()->c_id);
        return view('moderator.home')->with('user',$user);
    }
}
