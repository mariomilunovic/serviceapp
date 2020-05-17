<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Gate;

class UserController extends Controller
{
    

    //my code

    public function validateUser()
     {
        return request()->validate([  
                'name' => 'required',            
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role_id'  => 'required'          
              ]);      
     }

    public function index(){
        $users = User::orderBy('updated_at','desc')->paginate(5);
        return view('users.index')->with('users',$users);
    }

    public function create(Request $request)
    {
        $roles = Role::all();
        return view('users.create')->with('roles',$roles);;
    }
    public function edit($id)
    {
        // if(Gate::denies('edit-users')){
        //     return redirect(route('users.index'));
        //     }

        $user = User::find($id);
        
        return view('users.edit')->with('user',$user);
    }

    public function store()
    {       
        //ddd($this->validateUser());
        $userdata = $this->validateUser();      //ovo je array       
        ///ddd($userdata);
        $newUser = User::create([               //ovo je object
            'name'=>$userdata['name'],
            'email'=>$userdata['email'],
            'password'=>Hash::make($userdata['password']),
        ]);
        $role = Role::where('id',$userdata['role_id'])->first();
      
        $newUser->roles()->attach($role);

        return redirect(route('users.index'))->with('success','Korisnik je uspešno unet');
    }


}