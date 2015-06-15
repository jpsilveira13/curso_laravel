<?php
/**
 * Created by PhpStorm.
 * User: Joao Paulo
 * Date: 15/06/2015
 * Time: 13:29
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeed extends Seeder{

    public function run(){
        DB::table('categories')->truncate();
        $faker = Faker::create();
        foreach(range(1,15) as $i){
            Category::create([
                'name' => $faker->word(),
                'description' => $faker->sentence()
            ]);

        }

    }
}