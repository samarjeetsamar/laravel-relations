<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container">
        @yield('content')  <!-- This will display the content from the @section('content') -->
    </div>
</body>
</html>
