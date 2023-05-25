@extends('partials.main')

@section('content')
<section>
    <div class="row justify-content-center align-items-center vh-100 bg-dark">
        <div class="col-auto text-center bg-secondary p-5 rounded-5">
            <form action="/pelajar/create" method="get">
                <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" name="kode" placeholder="Masukan kode ulangan" autofocus>
                </div>
                <div class="">
                    <button class="btn btn-dark">Masuk Kelas</button>
                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection