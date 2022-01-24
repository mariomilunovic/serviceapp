<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Gate;

class UserController extends Controller
{


    //my code

    public function show($id)
    {
        $user=User::find($id);
        return view ('users.show')->with('user',$user);
    }

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
        $roles = Role::all();

        return view('users.edit')->with(['user'=>$user,'roles'=>$roles]);
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

    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',            
            'password' => 'required|min:6'
        ]);

        $user->name = request('name');
        $user->password = request('password');

        $role = Role::where('id',$user->role_id)->first();
        $user->roles()->detach($role);

        $role = Role::where('id',request('role_id'))->first();
        $user->roles()->attach($role);
        
        $user->save();
        return redirect(route('users.index'))->with('success','Izmena uspešna');
    }


}
