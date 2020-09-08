<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lead;
use Faker\Generator as Faker;

$factory->define(Lead::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'client_id' => 1,
        'workflow_id' => 1,
        'job_id' => 1,
    ];
});
