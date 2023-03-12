@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h2 class="text-dark fw-bold" style="font-weight: bold">Daftar Buku</h1>
@endsection

@section('content')
    <div class="card">
        <h3 class="judul m-3" style="font-weight:bold; color: #293462;">{{ $kategori->nama }}</h3>
        @if ($kategori->deskripsi != null)
            <p class="deskripsi m-3">{{ $kategori->deskripsi }}</p>
        @else
            <p class="deskripsi m-3">Tidak Ada Deskripsi</p>
        @endif
        <div class="d-flex justify-content-end">
            <a href="/kategori" class="btn mx-3 my-3 text-white" style="font-weight:bold; background-color: #FEB139;">Kembali</a>
        </div>
    </div>

    <h4 class="m-3" style="font-weight:bold; color: #293462;">Buku Terkait Kategori :</h4>

    <div class="card container-fluid mb-3">

        <div class="row d-flex flex-wrap justify-content-center">

            @forelse ($kategori->kategori_buku as $item)
                <div class="col-auto my-2" style="width:18rem;">
                    <div class="card mx-2 my-2" style="min-height:28rem;">
                        @if ($item->gambar != null)
                            <img class="card-img-top" style="max-height:180px;" src="{{ asset('/images/' . $item->gambar) }}">
                        @else
                            <img class="card-img-top" style="height:200px;" src="{{ asset('/images/noImage.jpg') }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="detai-buku">
                                <h5 class="card-title"><a
                                        href="/buku/{{ $item->id }}" class="text-dark" style="text-decoration: none; font-size:1.2rem;font-weight:bold;">
                                        {{ $item->judul }}</a></h5>
                                <p class = "cart-text m-0 fw-bold" style="color: black;">Kode Buku : <a href="" class="text-secondary" tyle="text-decoration: none;">{{ $item->kode_buku }}</a></p>
                                <p class="card-text m-0" style="color: black;" >Pengarang : <a href="#"
                                        style="text-decoration: none;" class="text-secondary">{{ $item->pengarang }}</a></p>
                                <p class="card-text m-0" style="color: black;">Kategori : </p>
                                <p class="text-secondary">
                                    @foreach ($item->kategori_buku as $kategori )
                                    {{ $kategori->nama, }},
                                    @endforeach
                            </p>
                                <p class="card-text m-0">Status : {{$item->status  }}</p>
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
                                    <button class="btn-sm btn-info px-2"><a href="/buku/{{ $item->id }}"
                                            style="text-decoration: none; color:white;">Detail</a></button>
                                    <button class="btn-sm btn-danger mx-1 px-3"><a href="/buku/{{ $item->id }}"
                                        style="text-decoration: none; color:white;">Pinjam Buku</a></button>
                                </div>
                            @endif

                            <!--Delete Modal -->
                            <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabelDelete">Wah Wah!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Beneran mau di hapus nih?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary"
                                                data-dismiss="modal">Cancel</button>
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
                <h3 class="text-primary mt-3">Tidak ada buku</h3>
            @endforelse

        </div>



    </div>
@endsection
