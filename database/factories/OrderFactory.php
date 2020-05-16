<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [

        'user_id'=> $faker->randomElement($array = array ('1','2','3','4')),
        'client_id'=>factory(App\Client::class),
        'device_id'=>factory(App\Device::class),
        'status_id'=>$faker->randomElement($array = array ('1','2','3')),

        'problem_description' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'time_spent' => $faker->randomDigitNot(0),
        'public_comment' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'internal_comment' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        
    ];
});
