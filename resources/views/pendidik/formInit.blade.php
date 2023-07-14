@extends('partials.main')

@section('content')
<section>

<div class="row text-light">
    <div class="col">
        <h2 class="fw-bold">Form Init</h2>
    </div>
    <div class="col-auto">
        <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/pendidik">Back</a>
    </div>
</div>

<div class="row m-0 justify-content-center align-items-center p-5 pt-0 min-vh-100">
    <div class="col-auto p-5 bg-white-blue rounded-4 h-100 text-center text-light" style="z-index: 100;">
        <form action="/pendidik/create" method="GET">
            <div class="mb-3">
                <label for="judul" class="form-label fs-4 fw-bold">Subject</label>
                <input type="text" class="form-control form-control-lg" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="pg" class="form-label fs-4 fw-bold">Multiple Choice</label>
                <input type="number" class="form-control form-control-lg" id="pg" name="pg">
            </div>
            <div class="mb-3">
                <label for="essai" class="form-label fs-4 fw-bold">Essay</label>
                <input type="number" class="form-control form-control-lg" id="essai" name="essai">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label fs-4 fw-bold">Time (in minute)</label>
                <input type="number" class="form-control form-control-lg" id="time" name="time">
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-dark-blue text-light fw-bold mx-auto">Next</button>
            </div>
        </form>
    </div>
</div>
</section>
@endsection