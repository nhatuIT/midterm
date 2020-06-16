<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body'=>$faker->text,
        'user_id'=>factory('App\User')->create()->id,
        'thread_id'=>factory('App\Thread')->create()->id
    ];
});
