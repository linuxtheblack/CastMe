<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
  return [
    'title'       => $faker->sentence,
    'content'     => $faker->paragraph,
    'images'      => json_encode([$faker->imageUrl()]),
    'roles'       => json_encode(['actor', 'entertainer']),
    'user_id'     => function () {
      return factory('App\User')->create()->id;
    }
  ];
});
