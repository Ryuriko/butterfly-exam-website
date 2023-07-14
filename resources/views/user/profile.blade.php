@extends('partials.main')

@section('content')

  <div class="row text-light">
    <div class="col">
        <h2 class="fw-bold">Profile</h2>
    </div>
  </div>

  <div class="containers-fluid">
    <div class="row m-0 py-3 py-sm0 justify-content-center align-items-center text-light">
        <div class="col-12 col-sm-12 mb-auto mb-md-0 text-center">
          <div class="">
	<img class="img-fluid mt-3 w-25" src="{{auth()->user()->picture !== Null ? asset('/storage/' . auth()->user()->picture) : 'https://cdn.pixabay.com/photo/2015/08/19/21/25/butterfly-896668_1280.png'}}">
            <span class="fs-5 fw-bold mt-3 d-block">{{auth()->user()->name}}</span>
          </div>
          <div class="row text-dark justify-content-evenly text-start mt-4 px-2 px-md-0" width="100%">
            <div class="col-12 col-md-5 bg-light rounded-3 mb-2 mb-md-3 px-4 py-3">
              <span class="d-block text-dark-blue fs-4 fw-bold">Identity Code</span>
              <span class="d-block text-dark-blue">{{auth()->user()->identity_code}}</span>
            </div>
            <div class="col-12 col-md-5 bg-light rounded-3 mb-2 mb-md-3 px-4 py-3">
              <span class="d-block text-dark-blue fs-4 fw-bold">Email</span>
              <span class="d-block text-dark-blue">{{auth()->user()->email}}</span>
            </div>
            <div class="col-12 col-md-5 bg-light rounded-3 mb-2 mb-md-3 px-4 py-3">
              <span class="d-block text-dark-blue fs-4 fw-bold">Instantion</span>
              <span class="d-block text-dark-blue">{{auth()->user()->instansi}}</span>
            </div>
            <div class="col-12 col-md-5 bg-light rounded-3 mb-2 mb-md-3 px-4 py-3">
              <span class="d-block text-dark-blue fs-4 fw-bold">As</span>
              <span class="d-block text-dark-blue">{{auth()->user()->auth}}</span>
            </div>
          </div>
        </div>
        <div class="col-auto text-center mt-3 mt-md-5">
          <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/profile/edit">Edit Profile</a>
        </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('vendor/particles/particles.js') }}"></script>
  <script src="{{ asset('vendor/particles/app.js') }}"></script>
@endsection


{{-- @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if (session()->has('loginError'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
            <div class="card rounded-5 p-3 p-md-5 m-md-5 m-3 mt-0 shadow-lg">
            <img  class="img-fluid rounded-5 mx-auto mb-4" src="{{ $user->picture !== Null ? $user->picture : 'https://cdn.pixabay.com/photo/2015/08/19/21/25/butterfly-896668_1280.png' }}" width="15%">
            <form action="/profile/{{auth()->user()->id}}" method="post" style="z-index: 100;" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-0">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control p-3 border border-dark @error('name')is-invalid @enderror" id="name" name="name" autofocus value="{{auth()->user()->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="identity_code" class="form-label">Kode Identitas (NIM, NIP, NIP, dsb)</label>
                        <input type="text" class="form-control p-3 border border-dark @error('identity_code')is-invalid @enderror" id="identity_code" name="identity_code" autofocus value="{{auth()->user()->identity_code}}">
                        @error('identity_code')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" class="form-control p-3 border border-dark @error('instansi')is-invalid @enderror" id="instansi" name="instansi" value="{{auth()->user()->instansi}}">
                        @error('instansi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                      <label class="form-label" for="auth">Sebagai</label>
                      <select class="form-select border p-3 border-dark" id="auth" disabled>
                        <option class="uppercase" value="{{auth()->user()->auth}}" selected>{{auth()->user()->auth}}</option>
                        <option value="pelajar">Pelajar</option>
                        <option value="pendidik">Pendidik</option>
                      </select>
                        @error('auth')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control p-3 border border-dark @error('email')is-invalid @enderror" id="email" value="{{auth()->user()->email}}" disabled>
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="picture" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control p-3 border border-dark @error('picture')is-invalid @enderror" id="picture" name="picture" value="{{auth()->user()->picture}}">
                        @error('picture')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <input type="hidden" name="email" value="{{auth()->user()->email}}">
                    <input type="hidden" name="auth" value="{{auth()->user()->auth}}">
                    <input type="hidden" name="id" value="{{auth()->user()->id}}">

                    <div class="col-12 d-flex align-items-center justify-content-center">
                      <button type="submit" class="btn btn-dark w-100">Perbarui Profile</button>
                    </div>
                </div>
            </form>
        </div> --}}