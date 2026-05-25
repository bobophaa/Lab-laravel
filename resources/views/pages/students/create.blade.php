@extends('layouts.app')
@section('title', 'Student Management')
@section('parent', 'Student Management')
@section('page', 'Add New Student')

@section('content')
<div class="rounded-2xl border border-gray-200 bg-white p-6">
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        @include('pages.students.partials.form')
        <div class="mt-6 flex justify-end gap-3 border-t border-gray-200 pt-5">
            <a href="{{ route('students.index') }}"
               class="rounded-full bg-gray-500 px-5 py-2 text-white hover:bg-gray-600">Cancel</a>
            <button type="submit"
                    class="rounded-full bg-primary px-5 py-2 text-white hover:bg-secondary">Save Student</button>
        </div>
    </form>
</div>
@endsection
