<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'mentor',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'incoming',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'enrollee',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'student',
            'guard_name' => 'web'
        ]);

        

    }
}
