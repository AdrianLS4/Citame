<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    //User admin create
        User::create([
            'name' => 'Adrian Sandoval',
            'email' => '4badriansandoval@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'cedula' => '014445661',
            'address' => 'Av. Principal, Ciudad de México',
            'phone' => '58144444444',
            'role' => 'admin',
        ]);

         User::factory()
            ->count(50)
            ->create();
    }
}
