@extends('partials.main')

@section('content')
<section>

    <div class="row text-light">
        <div class="col">
            <h2 class="fw-bold">Dashboard</h2>
        </div>
        <div class="col-auto">
            <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/pendidik/init">New</a>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible fade show col-10" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if (session()->has('failed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row m-0 justify-content-evenly text-light">
        @foreach ($soal as $data)   
        <div class="col-10 col-md-3 bg-white-blue rounded-4 p-3 my-3 me-md-1">
            <a href="/pendidik/{{$data['judul']}}" class="text-end nav-link">Details</a>
            <div class="text-start ms-3 mt-2">
                <i class="bi bi-file-bar-graph fs-5 me-2"></i>
                <h5 class="d-inline"> {{$data['judul']}}</h5>
            </div>
            <div class="row mt-5 mb-3">
                <div class="col ms-3 my-auto">
                    <span class="fs-2 fw-bold">25</span>
                    <br>
                    <span>work</span>
                </div>
                <div class="col">
                    <div class="bg-light shadow rounded-circle p-3 text-center">
                        <span class="text-success fw-bold fs-5">94%</span>
                        <br>
                        <span class="text-success">Average</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

{{-- @foreach ($soal as $data)            
        <div class="col-md-auto me-md-1 h-100 text-center bg-light rounded-5 py-3" style="width: 18rem; z-index: 100;">
            <a href="/pendidik/{{$data['judul']}}" class="nav-link">
                <div class="card-body">
                    <h5 class="card-title text-success">{{$data['judul']}}</h5>
                </div>
            </a>
        </div>
        @endforeach --}}

{{-- <div class="col-3 col-md-auto h-100 bg-light rounded-5 py-3" style="width: 18rem; z-index: 100;">
    <div class="card-body text-center">
        <a href="/pendidik/init" class="card-title nav-link">
            <h5 class="card-title"><i class="bi bi-plus-circle fs-4 fw-bold text-success"></i></h5>
        </a>
    </div>
</div> --}}