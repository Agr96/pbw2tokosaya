<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul', 'Back Office')</title>

    <link rel="stylesheet" href="{{ asset('assets/adminlte/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@yield('judul-halaman')</h1>
        </section>

        <section class="content">
            @yield('konten')
        </section>
    </div>

</div>

<script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
