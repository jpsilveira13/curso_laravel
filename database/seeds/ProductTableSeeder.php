<?php
/**
 * Created by PhpStorm.
 * User: Joao Paulo
 * Date: 15/06/2015
 * Time: 13:29
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder{

    public function run(){
        DB::table('products')->truncate();
        $faker = Faker::create();
        foreach(range(1,15) as $i){
            Product::create([
                'name' => $faker->name(),
                'description' => $faker->sentence(),
                'price' =>  $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9999),
                'featured' =>  $faker->numberBetween($min = 0, $max=1),
                'recommend' =>  $faker->numberBetween($min = 0, $max=1)

            ]);

        }

    }
}