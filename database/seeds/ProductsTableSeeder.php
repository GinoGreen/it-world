<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        for ($i=0; $i < 3; $i++) { 
  
            $new_product = new Product();
            $new_product->name = $faker->name;
            $new_product->description = $faker->text;
            $new_product->img = $faker->name;
            $new_product->price = $faker->numberBetween(1, 5);
            $new_product->save();
        }
    }
}
