<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    $classrooms = \App\Models\Classroom::pluck("id")->toArray();
    return [
        "title" => $faker->jobTitle,
        "description" => $faker->realText($maxNbChars = 100, $indexSize = 2),
        "note_img_id" => 1,
        "classroom_id" => $faker->randomElement($classrooms),
        "document" => "dummyfiles/".$faker->randomElement(array("1.pdf", "2.pdf", "3.pdf"))
    ];
});
