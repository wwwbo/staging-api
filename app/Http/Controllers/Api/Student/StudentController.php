<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Services\Student\StudentApiService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentApiService;

    public function __construct(StudentApiService $studentApiService)
    {
        $this->studentApiService = $studentApiService;
    }

    public function index(Request $request)
    {
        return $this->studentApiService->index($request);
    }

    public function show($request)
    {
        return $this->studentApiService->show($request);
    }

    public function store(Request $request)
    {
        return $this->studentApiService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->studentApiService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->studentApiService->destroy($id);
    }
}
