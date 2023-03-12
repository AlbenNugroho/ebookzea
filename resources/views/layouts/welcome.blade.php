<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('/img/logo.png')}}" rel="icon">
        <title>Sistem Informasi Perpustakaan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/css/style.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('/template/css/ruang-admin.min.css')}}" rel="stylesheet">
        <link href="{{asset('/template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
<!--Hey! This is the original version
of Simple CSS Waves-->

<div class="header">

<!--Content before waves-->
<div class="inner-header flex">
<h1>Sistem Informasi Perpustakaan</h1>

@yield('content')
</div>



</div>
<!--Header ends-->

<!--Content starts-->

</body>
</html>
