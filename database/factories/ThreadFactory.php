<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'title'=>$faker->word,
        'body'=>$faker->text,
        'category_id'=>factory('App\Category')->create()->id,
        'user_id'=>factory('App\User')->create()->id
    ];
});
