<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Order::truncate();
        $now = now();
        factory(App\Order::class, 20)->create(['payment_status'=>$now,'status_id'=>'4']);
        factory(App\Order::class, 30)->create();
        
    }
}
