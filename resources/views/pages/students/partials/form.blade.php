<div class="grid grid-cols-1 gap-5 md:grid-cols-2">

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Student Name</label>
        <input type="text" name="name"
               value="{{ old('name', $student->name ?? '') }}"
               placeholder="Enter student name"
               class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
        @error('name')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email ?? '') }}"
               placeholder="Enter student email"
               class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
        @error('email')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Phone</label>
        <input type="text" name="phone"
               value="{{ old('phone', $student->phone ?? '') }}"
               placeholder="Enter student phone"
               class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
        @error('phone')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Gender</label>
        <select name="gender_id"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">Select Gender</option>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}"
                    @selected(old('gender_id', $student->gender_id ?? '') == $gender->id)>
                    {{ $gender->name }}
                </option>
            @endforeach
        </select>
        @error('gender_id')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

</div>
