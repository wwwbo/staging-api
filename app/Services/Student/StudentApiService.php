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
}
