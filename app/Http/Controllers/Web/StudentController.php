<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Student\StudentService;
use Illuminate\View\View;

class StudentController extends Controller
{

    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(): View
    {
        $students = $this->studentService->index();
        return view('dashboard.index', compact('students'));
    }
}
