<?php

use App\Job_role;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $new_user = new User();
            $new_user->name = $faker->word();
            $new_user->surname = $faker->word();
            $new_user->email = $faker->freeEmail();
            $new_user->region = 'Abruzzo';
            $new_user->level = 'Junior';
            $new_user->password = Hash::make('password'); 
            $new_user->save();

        }

        $users = User::all();

        foreach ($users as $user) { 
            $job_role = Job_role::inRandomOrder()->first();
            $user->job_roles()->attach($job_role->id);
        }
    }
}
