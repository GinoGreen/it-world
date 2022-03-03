<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;
use App\User;
class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100 ; $i++) { 
            # code...
            $newReview = new Review();
            $newReview->title = $faker->name();
            $newReview->description = $faker->text();
            $newReview->user_id = User::inRandomOrder()->first()->id;
            $newReview->vote = $faker->numberBetween(1, 5);
            $newReview->month =$faker->numberBetween(1, 12);
            $newReview->year = $faker->numberBetween(2000, 2005);
            $newReview->save();

        }
    }
}
