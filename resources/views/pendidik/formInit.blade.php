@extends('partials.main')

@section('content')
<section>
<div class="row m-0 justify-content-center align-items-center p-5 pt-0 min-vh-100">
    <div class="col-auto p-5 text-bg-light rounded-4 h-100 text-center text-success" style="z-index: 100;">
        <form action="/pendidik/create" method="GET">
            <div class="mb-3">
                <label for="judul" class="form-label fs-4 fw-bold">Judul soal</label>
                <input type="text" class="form-control form-control-lg border border-dark" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="pg" class="form-label fs-4 fw-bold">Total soal pilihan ganda</label>
                <input type="number" class="form-control form-control-lg border border-dark" id="pg" name="pg">
            </div>
            <div class="mb-3">
                <label for="essai" class="form-label fs-4 fw-bold">Total soal essai</label>
                <input type="number" class="form-control form-control-lg border border-dark" id="essai" name="essai">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label fs-4 fw-bold">Lama pengerjaan (dalam menit)</label>
                <input type="number" class="form-control form-control-lg border border-dark" id="time" name="time">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success fw-bold mx-auto">Buat</button>
            </div>
        </form>
    </div>
</div>
</section>
@endsection