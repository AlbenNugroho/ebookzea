@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-dark fw-bold" style="font-weight: bold">Daftar Buku</h1>
@endsection

@section('content')
    @if (Auth::user()->isAdmin == 1)
        <a href="/buku/create" class="btn mb-3 text-white" style="background-color:#FEB139">Tambah Buku</a>
    @endif

    <form class="navbar-search mb-3" action="/buku" method="GET">
        <div class="input-group">
            <input type="search" name="search" class="form-control bg-light border-1 small" placeholder="Cari Judul Buku"
                aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
            <div class="input-group-append">
                <button class="btn" style="background-color:#FEB139" type="submit">
                    <i class="fas fa-search text-white fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="card container-fluid mb-3">

        <div class="row d-flex flex-wrap justify-content-center">

            @forelse ($buku as $item)
                <div class="col-auto my-2" style="width:18rem;">
                    <div class="card mx-2 my-2" style="min-height:28rem;">
                        @if ($item->gambar != null)
                            <img class="card-img-top" style="max-height:200px;" src="{{ asset('/images/' . $item->gambar) }}">
                        @else
                            <img class="card-img-top" style="height:200px;" src="{{ asset('/images/noImage.jpg') }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="detai-buku">
                                <h5 class="card-title text-bold"><a href="/buku/{{ $item->id }}" class="text-bold" style="color: black; text-decoration: none; font-size:1.2rem;font-weight:bold;">
                                        {{ $item->judul }}</a></h5>
                                <p class = "cart-text m-0">Kode Buku : {{ $item->kode_buku }}</p>
                                <p class="card-text m-0">Pengarang : <a href="#"
                                        style="text-decoration: none; color: black;">{{ $item->pengarang }}</a></p>
                                <p class="card-text m-0">Kategori : </p>
                                <p class="text-dark">
                                    @foreach ($item->kategori_buku as $kategori )
                                    {{ $kategori->nama }},
                                    @endforeach
                            </p>
                                <p class=" text-body card-text m-0 text-success">Status : <a href="" class="text-success"> {{$item->status  }}</a></p>
                            </div>
                            @if (Auth::user()->isAdmin == 1)
                                <div class="button-area">
                                    <button class="btn" style="background-color:#293462"><a href="/buku/{{ $item->id }}"
                                            style="text-decoration: none; color:white;">Detail</a></button>
                                    <button class="btn" style="background-color:#FFF80A"><a href="/buku/{{ $item->id }}/edit"
                                            style="text-decoration: none;color:black">Edit</a></button>
                                    <button class="btn" style="background-color:#D61C4E"><a data-toggle="modal"
                                            data-target="#DeleteModal{{ $item->id }}" style="text-decoration: none;color:white">Delete</a></button>
                                </div>
                            @endif

                            @if (Auth::user()->isAdmin == 0)
                                <div class="button-area">
                                    <button class="btn-sm btn-info px-2"> <a href="/buku/{{ $item->id }}"
                                    style="text-decoration: none; color:white;">Detail</a></button>
                                    <button class="btn-sm btn-danger px-4"><a a href="/peminjaman/create"
                                    style="text-decoration: none; color:white;">Pinjam Buku</a></button>
                                </div>
                            @endif

                            <!--Delete Modal -->
                            <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabelDelete">Wah wah</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Beneran mau di hapus?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/buku/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger px-4" type="submit"
                                                    value="delete">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-primary mt-3">Tidak ada buku</h1>
            @endforelse

        </div>

        <div class="d-flex justify-content-between mx-2 my-2">
            <p class="text-primary my-2">Menampilkan {{ $buku->currentPage() }} dari {{ $buku->lastPage() }} Halaman</p>

            {{ $buku->links() }}
        </div>

    </div>
@endsection
