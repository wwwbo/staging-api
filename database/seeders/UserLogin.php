<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;

class UserLogin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'super admin',
                'email' => 'super admin@mail.com',
                'password' => Hash('sha256', 'abc123')
            ],
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash('sha256', 'abc123')
            ],
            [
                'name' => 'viewer',
                'email' => 'viewer@mail.com',
                'password' => Hash('sha256', 'abc123')
            ],
        ];

        foreach ($users as $value) {
            User::factory()->create($value);
        }
    }
}
