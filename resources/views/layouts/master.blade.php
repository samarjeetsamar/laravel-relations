<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    
    @include('layouts.navigation')
    @include('partials.header')

    
    @hasSection('relationshipMenu')
        @yield('relationshipMenu')
    @endif
    @hasSection('breadcrumb')
    <header class="bg-blue-100 p-4 text-dark text-center">
        <h1 class="text-4xl font-bold"> @yield('breadcrumb') </h1>
    </header>
    @endif

    
    <main class="py-4">
       <div class="container max-w-screen-lg mx-auto my-4">
            <div class="container">
                {{ $slot }}
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
	    function closeAlert() {
            const alertElement = document.getElementById('alert');
            alertElement.style.display = 'none'; // Hides the alert
        }
    </script>
    @stack('scripts')
</body>
</html>