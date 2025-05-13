<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


</head>

<body>
    <div class="w3layouts-main">
        <div class="bg-layer">
            <h1 id="titlee">
                <a href="https://yoadministro.com" style="color:#337ab7;">
                    @if (file_exists(public_path('img/images/login.png')))
                        <img src="img/images/login.png" class="img-rounded" alt="Logo" width="300">
                    @else
                        {{ config('app.name', 'SAF') }}
                    @endif
                </a>
            </h1>
            <div class="header-main">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
