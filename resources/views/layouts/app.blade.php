<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <aside class="w-64 bg-white border-r border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h1 class="text-xl font-bold text-primary">SMS Lab</h1>
        </div>
        <nav class="p-4 space-y-2">
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                Dashboard
            </a>
            <a href="{{ route('students.index') }}"
               class="block px-4 py-3 rounded-xl {{ request()->routeIs('students.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                Students
            </a>
        </nav>
    </aside>

    <div class="flex-1">
        <header class="bg-white border-b border-gray-200 px-8 py-5">
            <p class="text-sm text-gray-500">@yield('parent')</p>
            <h2 class="text-2xl font-bold text-gray-800">@yield('page')</h2>
        </header>

        <main class="p-8">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</div>
</body>
</html>
