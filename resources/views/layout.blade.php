<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <nav>
        <a href="{{ route('videos.index') }}">Home</a>
        <a href="{{ route('videos.create') }}">Add Video</a>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>&copy; 2024 Video Management</p>
</footer>
</body>
</html>
