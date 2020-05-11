<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;

class UserController extends Controller
{
    

    //my code

   

    public function index(){
        $users = User::orderBy('updated_at','desc')->paginate(5);
        return view('users.index')->with('users',$users);
    }

    public function edit($id)
    {
        // if(Gate::denies('edit-users')){
        //     return redirect(route('users.index'));
        //     }

        $user = User::find($id);
        return view('users.edit')->with('user',$user);
    }


}