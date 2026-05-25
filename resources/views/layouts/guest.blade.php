<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">SMS Lab</a>
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-primary transition">Dashboard</a>
                <a href="{{ route('students.index') }}" class="bg-primary text-white px-5 py-2 rounded-full hover:bg-secondary transition">Students</a>
            </div>
        </div>
    </header>

    <main>@yield('content')</main>

</body>
</html>
