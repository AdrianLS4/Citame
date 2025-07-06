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

        User::create([
            'name' => 'Estilita García',
            'email' => 'tydusekid@mailinator.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'cedula' => '0006414253',
            'phone' => '58144444444',
            'role' => 'paciente',
        ]);

        User::create([
            'name' => 'Betty Sandoval',
            'email' => 'luisneidymartinez5@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'cedula' => '0004678975',
            'phone' => '584142374443',
            'role' => 'doctor',
        ]);



         User::factory()
            ->count(50)
            ->create();
    }
}
