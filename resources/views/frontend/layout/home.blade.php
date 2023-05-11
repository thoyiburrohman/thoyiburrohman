<!DOCTYPE html>
<html lang="en" data-bs-theme="">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta author="Thoyiburrohman" />
    <meta description="My Portofolio" />

    <!-- title -->
    <title>Thoyiburrohman</title>


    <!-- icon -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap-5.3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    @yield('content')
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="{{ asset('libs/bootstrap-5.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>