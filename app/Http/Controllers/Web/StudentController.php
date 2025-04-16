<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Services\Student\StudentService;
use Illuminate\Http\RedirectResponse;
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

    public function create(): View
    {
        return view('dashboard.create');
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $students = $this->studentService->store($request);

        return redirect()->route('dashboard.index')->with([$students['status'] => $students['message']]);
    }

    public function show(string $id): View
    {
        $student = $this->studentService->show($id);

        return view('dashboard.view', compact('student'));
    }

    public function edit(string $id): View
    {
        $student = $this->studentService->show($id);

        return view('dashboard.edit', compact('student'));
    }

    public function update(StoreStudentRequest $request, $id): RedirectResponse
    {
        $students = $this->studentService->update($request, $id);

        return redirect()->route('dashboard.index')->with([$students['status'] => $students['message']]);
    }
}
