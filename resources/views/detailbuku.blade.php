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
                    <div class="navbar-nav">
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid overflow-hidden p-0">
            @foreach ($detailbooks as $bukdet)
            <div class="row g-0">
                <div class="col-md-6 order-md-2">
                    <div class="card" lc-helper="video-bg">
                        <img class="vh-100" src="{{ asset('images/'.$bukdet->gambar) }}" style="object-fit: cover; object-position: 50% 50%;">
                    </div>
                </div>
                <div class="col-md-6 order-md-1 my-auto text-left" style="padding:40px">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h1>{{$bukdet->judul}}!</h2>
                            <hr />
                            <h4 class="card-text">{{$bukdet->kode_buku}}</h3>
                            <p class="card-text">{{$bukdet->pengarang}}</p>
                            <p class="card-text">{{$bukdet->penerbit}}</p>
                            <p class="card-text">{{$bukdet->tahun_terbit}}</p>
                            <p class="lead">{{$bukdet->deskripsi}}</p>
                        </div>
                    </div>
                    <!-- <div class="lc-block">
                        <a class="btn btn-primary" href="#" role="button">Click me, I'm a button</a>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>



    </body>
</html>