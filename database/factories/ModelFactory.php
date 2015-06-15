<?php


$factory->define('App\User',function($faker){
     return [
       'name'=> $faker->name,
         'email'=> $faker->name,
         'password'=> str_random(10),
         'remember_token'=> str_random(10)

     ];

});

