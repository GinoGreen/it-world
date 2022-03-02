<?php

use App\Job_role;
use Illuminate\Database\Seeder;

class Job_rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_roles = [
            'Front End Developer',
            'Back End Developer',
            'Social Media Manager',
            'UX Designer',
            'UI Designer',
            'App Developer',
            'Cyber Security Engineer',
        ];

        foreach ($job_roles as $job_role) {
            $new_job_role = new Job_role();
            $new_job_role->name = $job_role;
            $new_job_role->save();
        }
    }
}
