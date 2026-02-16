<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'a@a.com',
            'password' => '12345678',
        ]);
        $user->assignRole('admin');

        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('student'); //5 usuarios estudiantes
        });

        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('teacher'); //5 usuarios profesores
        });
    }
}
