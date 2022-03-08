<?php

use App\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['HTML','PHP','Javascript','CSS','SCSS','Adobe Illustrator','Photoshop'];
        foreach ($skills as $skill) {
            $new_skill = new Skill();
            $new_skill->name = $skill;
            $new_skill->save();
        }
    }
}
