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

        
        return response()->json($students);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'unique:students,email'],
            'phone'     => ['nullable', 'string', 'max:20'],
            'gender_id' => ['required', 'exists:genders,id'],
        ]);

        $student = Student::create($validated);

      
        return response()->json([
            'success' => true,
            'message' => 'Student created successfully.',
            'data'    => $student->load('gender')
        ], 201); 
       
    }


    public function show(Student $student)
    {
        $student->load('gender');

        return response()->json($student);
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

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully.',
            'data'    => $student->load('gender')
        ]);
    }

    // 5. លុបទិន្នន័យសិស្សតាមសំណើពី React
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully.'
        ]);
    }

    // 6. បង្កើត API បន្ថែមមួយទៀតសម្រាប់ឱ្យ React ទាញយកបញ្ជីភេទ (Genders) ទៅដាក់ក្នុង Dropdown Option
    public function getGenders()
    {
        $genders = Gender::orderBy('name')->get();
        return response()->json($genders);
    }
}