<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        // Blueprint for a project
        'body'         => $faker->paragraph(5),
        'project_id'   => factory(App\Project::class)
    ];
});
