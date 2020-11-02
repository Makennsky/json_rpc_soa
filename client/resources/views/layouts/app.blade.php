<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

<main class="main-content" id="content">
    <div class="main-content-wrapper">
        <!-- Content -->
        @yield('content')
    </div>
    <!--Footer-->
</main>
</body>
</html>
