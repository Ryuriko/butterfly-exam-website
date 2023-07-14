@extends('partials.main')

@section('content')
<section class="text-light">

    <div class="row">
        <div class="col">
            <h2 class="fw-bold">Dashboard</h2>
        </div>
    </div>

    <div class="mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form class="row m-0 align-items-center justify-content-center" action="/pelajar/create" method="get">
            <div class="col-7 col-md-10">
                <input type="text" class="form-control form-control-lg" name="kode" placeholder="Enter exam code" autofocus>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary fw-bold fs-5">Join</button>
            </div>
        </form>
    </div>

    <div class="h3 mt-3 mt-md-5 pt-0 pt-md-5">Attention!</div>

    <div class="row m-0 mt-3 py-3 py-sm-0 justify-content-center align-items-center text-light">
        <div class="col-12 col-sm-12 mb-auto mb-md-0 text-center">
          <div class="row text-dark justify-content-evenly text-start mt-4 px-2 px-md-0" width="100%">
            <div class="col-12 col-md-5 bg-white-blue rounded-3 mb-4 mb-md-4 p-3">
                <img class="img-fluid float-start me-2" src="{{asset('/media/dashboard_pelajar/img1.png')}}">
                <span class="text-light">Do not open a new tab because the system will detect it and will automatically collect it when 2 or more times you open a new tab</span>
            </div>
            <div class="col-12 col-md-5 bg-white-blue rounded-3 mb-4 mb-md-4 p-3">
                <img class="img-fluid float-start me-2" src="{{asset('/media/dashboard_pelajar/img2.png')}}">
                <span class="text-light">Profile data will appear on the detail page of the results you are working on which can be seen by the question owner</span>
            </div>
            <div class="col-12 col-md-5 bg-white-blue rounded-3 mb-4 mb-md-4 p-3">
                <img class="img-fluid float-start me-2" src="{{asset('/media/dashboard_pelajar/img3.png')}}">
                <span class="text-light">When the working time is over, the exam will be collected automatically</span>
            </div>
            <div class="col-12 col-md-5 bg-white-blue rounded-3 mb-4 mb-md-4 p-3">
                <img class="img-fluid float-start me-2" src="{{asset('/media/dashboard_pelajar/img4.png')}}">
                <span class="text-light">Do not open a new tab because the system will detect it and will automatically collect it when 2 or more times you open a new tab</span>
            </div>
          </div>
        </div>
    </div>
















</section>
@endsection

{{-- @if (session()->has('done'))
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
</form> --}}
