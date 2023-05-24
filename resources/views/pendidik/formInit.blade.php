@extends('partials.main')

@section('content')
<section class="bg-dark">
<div class="row m-0 justify-content-center align-items-center p-5 pt-0 min-vh-100">
    <div class="col-auto p-5 text-bg-secondary rounded-4 h-100">
        <form action="/pendidik/create" method="GET">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Soal (ex: Mata pelajaran)</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="pg" class="form-label">Total soal pilihan ganda</label>
                <input type="number" class="form-control" id="pg" name="pg">
            </div>
            <div class="mb-3">
                <label for="essai" class="form-label">Total soal essai</label>
                <input type="number" class="form-control" id="essai" name="essai">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark fw-bold mx-auto">Buat</button>
            </div>
        </form>
    </div>
</div>
</section>
@endsection