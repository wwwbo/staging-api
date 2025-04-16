<?php

namespace App\Services\Student;

use App\Models\Student;

class StudentService
{
    public function index()
    {
        return Student::latest()->paginate(10);
    }

    public function store($data)
    {
        if ($data->file('photo')) {
            $image = $data->file('photo');
            $image->storeAs('student', $image->hashName());
            $userPhoto = $image->hashName();
        } else {
            $userPhoto = 'images/default.jpg';
        }

        $student = Student::create([
            'name' => $data->name,
            'email' => $data->email,
            'religion' => $data->religion,
            'place_of_birth' => $data->place_of_birth,
            'date_of_birth' => $data->date_of_birth,
            'gender' => $data->gender,
            'address' => $data->address,
            'phone_number' => $data->phone_number,
            'photo' => $userPhoto
        ]);

        return [
            'status' => $student ? 'success' : 'failed',
            'message' => $student ? 'Success create data' : 'Failed create data'
        ];
    }
}
