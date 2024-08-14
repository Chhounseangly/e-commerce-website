<!-- Stored in resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.1.2/src/css/pagedone.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        html,
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="flex gap-10">
        {{-- login and register pages it will hide it --}}
        @if (!request()->is('login') && !request()->is('register') && !request()->is('/'))
            @include('Includes.side_bar')
        @endif
        <div class="w-full p-2 md:p-0">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.1.2/src/js/pagedone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>
