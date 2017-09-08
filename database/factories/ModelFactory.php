<?php
use App\User;
use Faker\Generator;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Generator $faker){
	
	$array = [

	'name' 		=> $faker->name,
	'email' 	=> $faker->email,
	'password' 	=> bcrypt('12345')   

	];

	return $array;

});
