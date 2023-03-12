<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stylish Portfolio - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->

        <style>
            .hero1 {
                background-image: url("{{ asset('img/roo.jpg') }}");
                background-size: cover;
                background-position: center;
            }
            .nick {
                padding-top: 130px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">EbopokRead</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/data-buku" class="nav-item nav-link">Buku</a>
                    </div>
                    <div class="navbar-nav ">
                        <a href="{{ route('login') }}" class="nav-item nav-link bg-warning px-4 rounded fw-bold">Login</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero1 text-light py-5 vh-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="display-4">Selamat datang di website ZeaRead</h1>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet est vel augue vestibulum mollis. Etiam congue vel felis id posuere.</p>
                        <a href="/data-buku" class="btn border border-light text-white btn-lg">Lihat Buku</a>

                        <p class="lead mt-4 nick">Alben</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container my-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($bukudata as $buk)
                <div class="col">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('images/' . $buk->gambar) }}" class="card-img-top"/>
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$buk->judul}}</h5>
                            <p class="card-text">{{$buk->pengarang}}</p>
                            <a href="/data-buku" class="btn btn-primary">Lihat selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </body>
</html>