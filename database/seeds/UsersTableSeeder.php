<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        
        User::truncate();
        DB::table('role_user')->truncate();
        
        $role_administror = Role::where('name','administrator')->first();
        $role_serviser = Role::where('name','serviser')->first();
        $role_neaktivan = Role::where('name','neaktivan')->first();
        

        $userAdministrator = User::create([
            'name'=>'Mario Milunović',
            'email'=>'mario@gmail.com',
            'password'=>Hash::make('administrator')
        ]);
        $userAdministrator->roles()->attach($role_administror);



        $userServiser = User::create([
            'name'=>'Petar Petrović',
            'email'=>'petar@gmail.com',
            'password'=>Hash::make('serviser')
        ]);
        $userServiser ->roles()->attach($role_serviser );
        


        $userNeaktivan = User::create([
            'name'=>'Marko Marković',
            'email'=>'marko@gmail.com',
            'password'=>Hash::make('neaktivan')
        ]);
        $userNeaktivan->roles()->attach($role_neaktivan);
            
    }
}
    