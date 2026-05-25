@extends('layouts.app')
@section('title', 'Student Management')
@section('parent', 'Student Management')
@section('page', 'Student List')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <form action="{{ route('students.index') }}" method="GET" class="grid flex-1 gap-3 md:grid-cols-3">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search student..."
                   class="rounded-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary">

            <select name="gender_id"
                    class="rounded-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                <option value="">All Gender</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" @selected(request('gender_id') == $gender->id)>
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>

            <div class="flex gap-2">
                <button type="submit" class="rounded-full bg-primary px-5 py-2 text-white hover:bg-secondary">
                    Filter
                </button>
                <a href="{{ route('students.index') }}"
                   class="rounded-full bg-gray-200 px-5 py-2 text-gray-700 hover:bg-gray-300">
                    Reset
                </a>
            </div>
        </form>

        <a href="{{ route('students.create') }}"
           class="rounded-full bg-primary px-5 py-2 text-center text-white hover:bg-secondary">
            Add Student
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Gender</th>
                    <th class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $student->id }}</td>
                        <td class="px-6 py-3 font-medium text-gray-800">{{ $student->name }}</td>
                        <td class="px-6 py-3">{{ $student->email }}</td>
                        <td class="px-6 py-3">{{ $student->phone ?? 'N/A' }}</td>
                        <td class="px-6 py-3">{{ $student->gender?->name }}</td>
                        <td class="px-6 py-3">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('students.show', $student) }}"
                                   class="text-primary hover:text-secondary">View</a>
                                <a href="{{ route('students.edit', $student) }}"
                                   class="text-yellow-600 hover:text-yellow-700">Edit</a>
                                <form method="POST" action="{{ route('students.destroy', $student) }}"
                                      onsubmit="return confirm('Delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                            No student found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
