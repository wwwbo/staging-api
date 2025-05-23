<?php

namespace App\Services\Student;

use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Storage;

class StudentApiService
{
    public function index($request)
    {
        try {
            $perPage = $request->get('per_page', 10);
            $students = Student::paginate($perPage);

            if (!$students)
                throw new Exception('Failed to load data');

            return responsePagination($students);
        } catch (Exception $e) {
            return responseError($e->getMessage(), null, 400);
        }
    }

    public function show($userId)
    {
        try {
            $student = Student::find($userId);
            if (!$student)
                throw new Exception('Data not found');

            return responseSuccess($student, 'Success fetch user');
        } catch (Exception $e) {
            return responseError('Please contact administrator', $e->getMessage(), 404);
        }
    }

    public function store($data)
    {
        try {
            $userPhoto = NULL;
            if ($data->hasFile('photo')) {
                $image = $data->file('photo');
                $image->storeAs('student', $image->hashName());
                $userPhoto = $image->hashName();
            }

            $checkEmailExist = Student::where('email', $data['email'])->exists();

            if ($checkEmailExist)
                throw new Exception('Data already exist', 409);

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

            if (!$student) throw new Exception('Failed create data', 400);

            return responseSuccess($student, 'Success create data');
        } catch (Exception $e) {
            return responseError($e->getMessage(), 'Bad Request');
        }
    }

    public function update($data, $userId)
    {
        try {
            $student = Student::findOrFail($userId);

            if (!$student) throw new Exception('User not found', 400);

            if ($data->hasFile('photo')) {
                Storage::delete('student/' . $student->photo);

                $image = $data->file('photo');
                $image->storeAs('student', $image->hashName());

                $student->update([
                    'name' => $data->name,
                    'email' => $data->email,
                    'religion' => $data->religion,
                    'place_of_birth' => $data->place_of_birth,
                    'date_of_birth' => $data->date_of_birth,
                    'gender' => $data->gender,
                    'address' => $data->address,
                    'phone_number' => $data->phone_number,
                    'photo' => $image->hashName()
                ]);
            } else {
                $student->update([
                    'name' => $data->name,
                    'email' => $data->email,
                    'religion' => $data->religion,
                    'place_of_birth' => $data->place_of_birth,
                    'date_of_birth' => $data->date_of_birth,
                    'gender' => $data->gender,
                    'address' => $data->address,
                    'phone_number' => $data->phone_number,
                ]);
            }

            if (!$student) throw new Exception('Failed update data', 400);

            return responseSuccess($student, 'Success update data');
        } catch (Exception $e) {
            return responseError($e->getMessage(), 'Bad Request');
        }
    }

    public function destroy($userId)
    {
        try {
            $student = Student::find($userId);

            if (!$student) throw new Exception('Data not found');

            Storage::delete('student/' . $student->photo);
            Student::find($student['id'])->delete();

            return responseSuccess($student, 'Success deleted user');
        } catch (Exception $e) {
            return responseError('Please contact administrator', $e->getMessage(), 404);
        }
    }
}
