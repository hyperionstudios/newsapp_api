<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content'   => $faker->text,
        'date_written'  => now(),
        'user_id'   => $faker->numberBetween( 1 , 50 ),
        'post_id'   => $faker->numberBetween( 1 , 500 )
    ];
});
