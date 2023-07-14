@extends('partials.main')

@section('content')

<section>

  <div class="row text-light">
    <div class="col">
        <h2 class="fw-bold">Exam</h2>
    </div>
    <div class="col-auto">
        <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/pendidik">Back</a>
    </div>
  </div>

  <div class="row m-0 justify-content-center min-vh-100 text-light">
      <div class="col col-md-10 bg-white-blue p-3 p-md-5 m-3 m-md-5 rounded-5" style="z-index: 100;">
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
          <h3 class="">Code : {{$kode}}</h3>
          <span>(for access the exam)</span>
          {{-- <hr class="mb-4"> --}}
          
          <div class="table-responsive mt-5">
            <table class="table text-center table-striped">
              <thead>
                <tr class="bg-dark-blue text-light">
                  <th scope="col">No</th>
                  <th scope="col">{{$soal[0]['nama']}}</th>
                  <th scope="col">{{$soal[0]['email']}}</th>
                  <th scope="col">{{$soal[0]['hasil']}}</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($soal->skip(1) as $data)
                      <tr class="bg-light">
                          <td>{{$loop->iteration}}</td>
                          <td>{{$data['nama']}}</td>
                          <td>{{$data['email']}}</td>
                          <td>{{$data['hasil']}}</td>
                          <td>
                            <form class="d-inline" action="/pendidik/{{$data['email']}}/detail" method="post">
                              @csrf
                              <input type="hidden" name="judul" value="{{$judul}}">
                              <input type="hidden" name="kode" value="{{$kode}}">
                              <button class="btn bg-dark-blue text-light fw-bolder btn-primary d-inline">Detail</button>
                            </form>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          <div class="d-flex justify-content-between mt-5">
              <a class="btn bg-success text-light fw-bold mx-md-2" href="/pendidik/{{$kode}}/edit">Edit</a>
              <form class="d-inline" action="/pendidik/{{$kode}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="judul" value="{{$judul}}">
                <input type="hidden" name="kode" value="{{$kode}}">
                <button type="submit" class="btn btn-danger d-inline text-light fw-bold">Delete</button>
              </form>
          </div>
      </div>
  </div>
</section>
@endsection