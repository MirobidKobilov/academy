<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@admin.com',
            'email_verified_at' => now()->subDays(5),
            'phone' => '+123456789123',
            'password' => Hash::make('admin1234'),
        ]);

        $user->assignRole(['admin']);
    }
}
