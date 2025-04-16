<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Monkey D Luffy',
                'email' => 'luffy@gmail.com',
                'religion' => 'Islam',
                'place_of_birth' => 'Bogor',
                'date_of_birth' => '2000/2/2',
                'gender' => 'Male',
                'address' => 'Desa Ciomas',
                'phone_number' => '085518192920',
                'photo' => 'upload/test.jpg'
            ]
        ];

        foreach ($students as $value) {
            Student::factory()->create($value);
        }
    }
}
