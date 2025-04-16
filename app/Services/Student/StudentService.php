<?php

namespace App\Services\Student;

use App\Models\Student;

class StudentService
{
    public function index()
    {
        return Student::latest()->paginate(10);
    }
}
