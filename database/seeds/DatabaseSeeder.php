<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PremiumPlansTableSeeder::class);
        $this->call(Job_rolesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
