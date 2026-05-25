<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
            'totalStudents'  => Student::count(),
            'totalGenders'   => Gender::count(),
            'latestStudents' => Student::with('gender')->latest()->take(5)->get(),
        ]);
    }
}
