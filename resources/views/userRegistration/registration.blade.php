@extends('partials.main')

@section('content')
  <div class="containers-fluid" id="particles-js">
    <div class="row m-0 justify-content-around align-items-center min-vh-100">
        <div class="col-auto mb-auto mb-md-0 text-center">
            <div class="card rounded-5 p-5 m-5 mt-0 shadow-lg">
            <img  class="img-fluid mx-auto rounded-5 mb-4" src="{{asset('media/landingpage/logo.png')}}" alt="Logo Butterfly">
            <form action="/registration" method="POST" style="z-index: 100;">
              @csrf
                <div class="row m-0">
                    <div class="col-6 mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control p-3 border border-dark @error('name')is-invalid @enderror" id="name" name="name" autofocus required value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" class="form-control p-3 border border-dark @error('instansi')is-invalid @enderror" id="instansi" name="instansi" value="{{old('instansi')}}" required>
                        @error('instansi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control p-3 border border-dark @error('email')is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required>
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg p-3 border border-dark @error('password')is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <a href="/" class="nav-link text-primary mb-2">Already have an account? Log in</a>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('vendor/particles/particles.js') }}"></script>
  <script src="{{ asset('vendor/particles/app.js') }}"></script>
@endsection