<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'firstname'=>$faker->firstName,
        'lastname'=>$faker->lastName,
        'company' =>$faker->company,
        'businessno'=>$faker->phoneNumber,
        'phone'=>$faker->phoneNumber,
        'email'=>$faker->email,
        'address'=>$faker->address,
        'town'=>$faker->city,
        'postcode'=>$faker->postcode,
        'state'=>$faker->state,
        'country'=>$faker->country,
        'notes'=>$faker->realText($faker->numberBetween(10,70)),
        // 'user_id'=>factory(App\User::class),
    ];
});
