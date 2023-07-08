@extends('partials.main')

@section('content')
<section>
    <div class="row m-0 min-vh-100 p-5 justify-content-evenly">

        @foreach ($soal as $data)            
        <div class="col-md-auto me-md-1 h-100 text-center bg-light rounded-5 py-3" style="width: 18rem; z-index: 100;">
            <a href="/pendidik/{{$data['judul']}}" class="nav-link">
                <div class="card-body">
                    <h5 class="card-title text-success">{{$data['judul']}}</h5>
                </div>
            </a>
        </div>
        @endforeach

        <div class="col-3 col-md-auto h-100 bg-light rounded-5 py-3" style="width: 18rem; z-index: 100;">
            <div class="card-body text-center">
                <a href="/pendidik/init" class="card-title nav-link">
                    <h5 class="card-title"><i class="bi bi-plus-circle fs-4 fw-bold text-success"></i></h5>
                </a>
            </div>
        </div>
        
    </div>
</section>
@endsection