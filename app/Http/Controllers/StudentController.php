<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('gender')->latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name',  'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('gender_id')) {
            $query->where('gender_id', $request->gender_id);
        }

        $students = $query->get();
        $genders  = Gender::orderBy('name')->get();

        return view('pages.students.index', compact('students', 'genders'));
    }

    public function create()
    {
        $student = new Student();
        $genders = Gender::orderBy('name')->get();

        return view('pages.students.create', compact('student', 'genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'unique:students,email'],
            'phone'     => ['nullable', 'string', 'max:20'],
            'gender_id' => ['required', 'exists:genders,id'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $student->load('gender');

        return view('pages.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $genders = Gender::orderBy('name')->get();

        return view('pages.students.edit', compact('student', 'genders'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'unique:students,email,' . $student->id],
            'phone'     => ['nullable', 'string', 'max:20'],
            'gender_id' => ['required', 'exists:genders,id'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
