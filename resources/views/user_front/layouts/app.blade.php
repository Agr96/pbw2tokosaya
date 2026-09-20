<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('judul', 'Toko Saya')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('user_front/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('user_front/assets/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_front/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('user_front/assets/css/tailwind.css') }}">
</head>
<body>
@include('user_front.partials.navbar')

@yield('konten')

@include('user_front.partials.footer')

<script src="{{ asset('user_front/assets/swiper/swiper-bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="{{ asset('user_front/assets/js/script.js') }}"></script>

</body>
</html>
