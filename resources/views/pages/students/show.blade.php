@extends('layouts.app')
@section('title', 'Student Management')
@section('parent', 'Student Management')
@section('page', 'Student Detail')

@section('content')
<div class="rounded-2xl border border-gray-200 bg-white p-6">
    <div class="space-y-6">
        <div>
            <label class="text-sm text-gray-500">ID</label>
            <p class="mt-1 text-lg font-medium text-gray-800">{{ $student->id }}</p>
        </div>
        <div>
            <label class="text-sm text-gray-500">Student Name</label>
            <p class="mt-1 text-lg font-medium text-gray-800">{{ $student->name }}</p>
        </div>
        <div>
            <label class="text-sm text-gray-500">Email</label>
            <p class="mt-1 text-lg font-medium text-gray-800">{{ $student->email }}</p>
        </div>
        <div>
            <label class="text-sm text-gray-500">Phone</label>
            <p class="mt-1 text-lg font-medium text-gray-800">{{ $student->phone ?? 'N/A' }}</p>
        </div>
        <div>
            <label class="text-sm text-gray-500">Gender</label>
            <p class="mt-1 text-lg font-medium text-gray-800">{{ $student->gender?->name }}</p>
        </div>
        <div class="flex justify-end gap-3 border-t border-gray-200 pt-4">
            <a href="{{ route('students.index') }}"
               class="rounded-full bg-gray-500 px-5 py-2 text-white hover:bg-gray-600">Back</a>
            <a href="{{ route('students.edit', $student) }}"
               class="rounded-full bg-primary px-5 py-2 text-white hover:bg-secondary">Edit Student</a>
        </div>
    </div>
</div>
@endsection
