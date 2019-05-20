<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content'   => $faker->text( 400 ),
        'date_written'  => now(),
        'featured_image'    => $faker->imageUrl(),
        'votes_up'  => $faker->numberBetween( 1 , 100 ),
        'votes_down'    => $faker->numberBetween( 1 , 100 ),
        'user_id'   => $faker->numberBetween( 1 , 50 ),
        'category_id'   => $faker->numberBetween( 1 , 15 ),
    ];
});
