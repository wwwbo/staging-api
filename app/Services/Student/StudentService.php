<?php

namespace App\Services\Student;

use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    public function index()
    {
        return Student::latest()->paginate(10);
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

            return [
                'status' => $student ? 'success' : 'error',
                'message' => $student ? 'Success create data' : 'Failed create data'
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function show(string $userId)
    {
        return Student::findOrFail($userId);
    }

    public function update($data, $userId)
    {
        try {
            $student = Student::findOrFail($userId);

            if ($data->hasFile('photo')) {
                Storage::delete('student/' . $student->image);

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

            return [
                'status' => $student ? 'success' : 'error',
                'message' => $student ? 'Success update data' : 'Failed update data'
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Failed update data'
            ];
        }
    }

    public function destroy($userId)
    {
        try {
            $student = Student::findOrFail($userId);
            Storage::delete('student/' . $student->photo);
            Student::find($student['id'])->delete();

            return [
                'status' => $student ? 'success' : 'error',
                'message' => $student ? 'Success delete data' : 'Failed delete data'
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Failed to delete data'
            ];
        }
    }
}
