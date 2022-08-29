<?php

namespace Database\Seeders;

use App\Models\MentorProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    public function run()
    {
        /** @var User $mentor*/
        $mentor = User::create([
            'name' => 'Mentor',
            'email' => 'mentor@mentor.com',
            'email_verified_at' => now()->subDays(5),
            'password' => Hash::make('password'),
        ]);

        $mentor->assignRole('mentor');
        MentorProfile::create([
            'user_id'=>$mentor->id
        ]);
    }
}
