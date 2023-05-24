@extends('partials.main')

@section('content')
  <div class="containers-fluid" id="particles-js">
    <div class="row m-0 justify-content-around align-items-center" style="height: 100vh">
        <div class="col-auto mt-auto mt-md-0 text-center">
          <img  class="img-fluid mx-auto rounded-5" src="{{asset('media/landingpage/logo.png')}}" alt="Logo Butterfly">
          </div>
          <div class="col-auto mb-auto mb-md-0 text-center">
            <div class="card rounded-5 p-5 m-5">

              <img  class="img-fluid mx-auto rounded-5 mb-4" src="{{asset('media/landingpage/logo.png')}}" alt="Logo Butterfly">

              @if (session()->has('success'))
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

              <form action="/" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control form-control-lg p-3 border border-dark @error('email')is-invalid @enderror" id="email" name="email" value="{{old('email')}}" autofocus required>
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control form-control-lg p-3 border border-dark @error('password')is-invalid @enderror" id="password" name="password" required>
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <a href="/registration" class="nav-link text-primary mb-2">Don't have an account? Click here</a>
                <button type="submit" class="btn btn-primary">Log in</button>
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