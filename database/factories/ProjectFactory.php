<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        // Blueprint for a project
        'title'         => $faker->sentence(4),
        'description'   => $faker->paragraph(4),
        'owner_id'      => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
