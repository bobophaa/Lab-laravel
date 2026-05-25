@extends('layouts.guest')
@section('title', 'Student Management Lab')
@section('content')

<div class="min-h-[80vh] flex items-center justify-center px-6">
    <div class="max-w-3xl text-center">
        <h1 class="text-5xl font-bold text-primary leading-tight">Student Management Lab</h1>
        <p class="text-gray-500 mt-6 text-lg">
            Practice Laravel routes, controllers, Blade layouts, includes, loops, and route parameters.
        </p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('dashboard') }}"
               class="bg-primary text-white px-6 py-3 rounded-full hover:bg-secondary transition">
                Open Dashboard
            </a>
            <a href="{{ route('students.index') }}"
               class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-full hover:bg-gray-50 transition">
                View Students
            </a>
        </div>
    </div>
</div>

@endsection
