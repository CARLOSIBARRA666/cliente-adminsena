<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="{{ request()->routeIs('login', 'register', 'welcome') ? '' : 'admin-area' }}">

    @unless (request()->routeIs('login', 'register'))
        @include('includes.navbar')
    @endunless

    <main class="{{ request()->routeIs('login', 'register') ? '' : 'container mt-4 pb-5' }}">
        @yield('content')
    </main>

    @unless (request()->routeIs('login', 'register'))
        @include('includes.footer')
    @endunless

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>