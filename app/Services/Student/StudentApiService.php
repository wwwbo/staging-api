<?php

namespace App\Services\Student;

use App\Models\Student;
use Exception;

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
}
