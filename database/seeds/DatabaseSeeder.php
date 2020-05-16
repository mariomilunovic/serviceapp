<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();// temporarily disable the mass assignment protection of the model

        $this->call( RoleSeeder::class);
        $this->call( ClientSeeder::class);
        $this->call( UserSeeder::class);
        $this->call( StatusSeeder::class);
        $this->call( DeviceSeeder::class);

        //Model::guard();// enable the mass assignment protection of the model
    }
}
