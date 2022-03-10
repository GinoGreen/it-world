<?php

use App\Message;
use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 1000 ; $i++) { 
            
            $newReview = new Message();
            $newReview->name = $faker->name();
            $newReview->email = $faker->freeEmail();
            $newReview->message = $faker->text();
            $newReview->user_id = User::inRandomOrder()->first()->id;
            $newReview->save();

        }
    }
}
