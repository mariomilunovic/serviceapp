<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Status::truncate(); //brise sve stare podatke iz tabele

        Status::create(['name'=>'čeka servis']);
        Status::create(['name'=>'servis u toku']);
        Status::create(['name'=>'čeka izdavanje']);
        Status::create(['name'=>'izdat']);
    }
}
