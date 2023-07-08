@extends('partials.main')

@section('content')
<section>
    <div class="row justify-content-center px-2 px-sm-0 align-items-center vh-100">
        <div class="col-auto text-center text-bg-light p-5 rounded-5" style="z-index: 100;">
            @if (session()->has('done'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('done') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('errorCode'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{ session('errorCode') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/pelajar/create" method="get">
                <div class="mb-3">
                    <input type="text" class="form-control form-control-lg border border-4 border-primary" name="kode" placeholder="Masukan kode ulangan" autofocus>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary fw-bold">Masuk Kelas</button>
                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection