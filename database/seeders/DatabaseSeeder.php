<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create(
            [
            'name' => 'Test User 1',
            'login' => 'User1',
            'is_admin' => 1,
            'email' => 'test1@example.com',
            'tel' => '79998887701',
            'password' => 'password1',
            ]
        );

        \App\Models\User::factory()->create(
            [
            'name' => 'Test User 2',
            'login' => 'User2',
            'email' => 'test2@example.com',
            'tel' => '79998887702',
            'password' => 'password2',
            ]
        );

        \App\Models\User::factory()->create(
            [
            'name' => 'Test User 3',
            'login' => 'User3',
            'email' => 'test3@example.com',
            'tel' => '79998887703',
            'password' => 'password3',
            ]
        );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
