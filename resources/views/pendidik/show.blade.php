@extends('partials.main')

@section('content')
<section>
    <div class="row m-0 justify-content-center min-vh-100">
        <div class="col-auto bg-light p-3 p-md-5 m-3 m-md-5 rounded-5" style="z-index: 100;">
            <h1 class="text-center">{{$judul}}</h1>
            <h3 class="text-success">Kode : {{$kode}}</h3>
            <span>(kode untuk pelajar memasuki halaman soal)</span>
            <hr class="mb-4">
            
            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">{{$soal[0]['nama']}}</th>
                    <th scope="col">{{$soal[0]['email']}}</th>
                    <th scope="col">{{$soal[0]['hasil']}}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($soal->skip(1) as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data['nama']}}</td>
                            <td>{{$data['email']}}</td>
                            <td>{{$data['hasil']}}</td>
                        </tr>
                    @endforeach
                 </tbody>
               </table>
              </div>

            <div class="text-center">
                <a href="/pendidik" class="btn btn-success text-light fw-bold">Beranda</a>
            </div>
        </div>
    </div>
</section>
@endsection