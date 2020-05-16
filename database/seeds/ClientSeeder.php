<?php

use Illuminate\Database\Seeder;
use App\Client;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();

        //MANUAL SEED

        // Client::create(['firstname'=>'Petar','lastname'=>'Petrović','email'=>'petar@gmail.com','tel'=>'063 456 798']);
        // Client::create(['firstname'=>'Marko','lastname'=>'Marković','email'=>'marko@gmail.com','tel'=>'063 222 798']);
        // Client::create(['firstname'=>'Kosta','lastname'=>'Kostić','email'=>'kosta@gmail.com','tel'=>'063 111 222']);
        // Client::create(['firstname'=>'Mika','lastname'=>'Mikić','email'=>'mika@gmail.com','tel'=>'063 323 798']);
        // Client::create(['firstname'=>'Ana','lastname'=>'Perić','email'=>'ana@gmail.com','tel'=>'064 222 798']);
        // Client::create(['firstname'=>'Zoran','lastname'=>'Stanković','email'=>'zoran@gmail.com','tel'=>'062 232 222']);
        // Client::create(['firstname'=>'Goran','lastname'=>'Petrović','email'=>'goran@gmail.com','tel'=>'061 456 345']);
        // Client::create(['firstname'=>'Slobodan','lastname'=>'Marić','email'=>'slobodan@gmail.com','tel'=>'063 345 798']);
        // Client::create(['firstname'=>'Aleksandar','lastname'=>'Marinković','email'=>'aleksandar@gmail.com','tel'=>'062 111 345']);


        
        // FACTORY+FAKER SEED

        factory(App\Client::class, 20)->create();

         
    }
}
