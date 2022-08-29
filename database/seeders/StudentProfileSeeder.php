<?php

namespace Database\Seeders;

use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'student',
            'email' => 'student@student.com',
            'phone' => '+123434343434',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole(['student']);
        StudentProfile::create([
            'user_id'=>$user->id,
        ]);
    }
}
