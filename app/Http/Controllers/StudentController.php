<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class StudentController extends Controller implements HasMiddleware
{
    // 1. Add this static method instead of the __construct()
    public static function middleware(): array
    {
        return [
            new Middleware('permission:students.view', only: ['index']),
            new Middleware('permission:students.create', only: ['create', 'store']),
            new Middleware('permission:students.edit', only: ['edit', 'update']),
            new Middleware('permission:students.delete', only: ['destroy']),
        ];
    }

    public function index(): View {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create(): View {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request): RedirectResponse {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }
        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    public function edit(Student $student): View {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }
        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated');
    }

    public function destroy(Student $student): RedirectResponse {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted');
    }
}
