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
        $user = User::firstOrCreate([
            'email' => 'a@a.com'
        ], [
            'name' => 'Admin',
            'password' => '12345678',
        ]);
        $user->assignRole('admin');

        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('estudiante'); //5 usuarios estudiantes
        });

        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('profesor'); //5 usuarios profesores
        });
    }
}
