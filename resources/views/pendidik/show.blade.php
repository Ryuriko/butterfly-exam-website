@extends('partials.main')

@section('content')

<section>
    <div class="row m-0 justify-content-center min-vh-100">
        <div class="col-auto bg-light p-3 p-md-5 m-3 m-md-5 rounded-5" style="z-index: 100;">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if (session()->has('failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

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
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($soal->skip(1) as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data['nama']}}</td>
                            <td>{{$data['email']}}</td>
                            <td>{{$data['hasil']}}</td>
                            <td>
                              <form class="d-inline" action="/pendidik/{{$data['email']}}/detail" method="post">
                                @csrf
                                <input type="hidden" name="judul" value="{{$judul}}">
                                <input type="hidden" name="kode" value="{{$kode}}">
                                <button class="btn btn-dark d-inline">Detail</button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                 </tbody>
               </table>
              </div>

            <div class="text-center mt-5">
                <a href="/pendidik" class="btn btn-success text-light fw-bold">Beranda</a>
                <a href="/pendidik/{{$kode}}/edit" class="btn btn-primary text-light fw-bold mx-md-2">Edit</a>
                <form class="d-inline" action="/pendidik/{{$kode}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="judul" value="{{$judul}}">
                  <input type="hidden" name="kode" value="{{$kode}}">
                  <button type="submit" class="btn btn-danger d-inline text-light fw-bold">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection