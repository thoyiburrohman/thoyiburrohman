<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Thoyiburrohman" />
    <meta name="description" content="My Portofolio" />
    <meta name="token" content="{{ csrf_token() }}" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- title -->
    <title>Thoyiburrohman | @yield('title')</title>

    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- icon -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap-5.3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

</head>

<body>
    @if (session()->has('pesan'))
        <div id="flash" data-flash="{{ session('pesan') }}">
        </div>
    @endif
    @if (session()->has('error'))
        <div id="flashError" data-flash="{{ session('error') }}">
        </div>
    @endif
    @yield('content')
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="{{ asset('libs/bootstrap-5.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>
    <script>
        var flash = $('#flash').data('flash');
        if (flash) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: flash
            })
        };
        var flashError = $('#flashError').data('flash');
        if (flashError) {
            Swal.fire({
                icon: 'warning',
                title: 'Gagal',
                text: flashError
            })
        };
    </script>
    @stack('scripts')
</body>

</html>
