<?php

namespace App\Http\Controllers;

use App\Child;
use App\UserIp;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all()->where('c_id',Auth::user()->id)->where('isadmin',0);
        return view('admin.showusers')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.addusers')->with("roles",$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => array('required'),
            'email' => array('required'),
            'password' => array('required'),
            'role' => array('required'),
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request['password']);
        $user->isadmin = 0;
        $user->c_id = Auth::user()->id;
        $user->save();
        DB::table('user_role')->insert(['user_id' => $user['id'], 'role_id' => $request->input('role')]);

        return redirect('/showusers')->with('success', 'User Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function usersReport()
    {
        $userip = UserIp::all()->where('c_id',Auth::user()->id);
        return view('admin.userip')->with('userip',$userip);
    }

    public function deleteUsersReport($id){
        $userip = UserIp::find($id);
        $userip->delete();
        return redirect()->back();
    }

    public function report(){
        return view('admin.report');
    }
}
