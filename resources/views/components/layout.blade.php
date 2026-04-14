<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navigation --}}
    <x-navbar />
    {{-- Main Content --}}
    <main class="max-w-7xl mx-auto p-6">
        {{ $slot }}
    </main>
</body>

</html>
