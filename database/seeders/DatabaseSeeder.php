<?php

namespace Database\Seeders;

use App\Models\Landing\LandingAbout;
use App\Models\Landing\LandingCourse;
use App\Models\Landing\LandingHome;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $seeders = [
            RoleSeeder::class,
            AdminSeeder::class,
            MentorSeeder::class,
            QuizSeeder::class,
            StudentProfileSeeder::class,
        ];



        $this->call($seeders);
    }
}
