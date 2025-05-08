<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="container mx-auto p-4">
        <!-- Navigation (optional) -->
        <nav class="bg-blue-500 p-4 rounded-md mb-6">
            <ul class="flex space-x-4">
                <li><a href="{{ route('authors.index') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Authors</a></li>
                <!-- Add more links here -->
            </ul>
        </nav>

        <!-- Content Section -->
        @yield('content')
    </div>
</body>
</html>
