@extends('partials.onboarding')

@section('content')
  <div class="containers-fluid">
    <div class="row m-0 justify-content-around align-items-center min-vh-100">
        <div class="col-auto mt-auto mt-md-0 text-center">
          <img  class="img-fluid mx-auto rounded-5 w-75" src="{{asset('media/landingpage/logo.png')}}" alt="Logo Butterfly">
          </div>
          <div class="col-12 col-sm-auto pb-auto pb-md-0 text-center">
            <div class="card rounded-5 p-3 p-md-5 m-md-5 m-3 mt-0 shadow-lg">

              <img  class="img-fluid mx-auto mb-4 w-50" src="{{asset('media/landingpage/login.png')}}" alt="Logo Butterfly">

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

            @guest
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
                <button type="submit" class="btn bg-white-blue text-light btn-primary fw-bold mb-2">Log in</button>
                <a href="/registration" class="nav-link text-primary">Don't have an account? Click here</a>
              </form>
              @else
                <h2 class="text">Welcome back, </h2>
                <h2 class="text-white-blue mb-4">{{auth()->user()->name}}!</h2>
                <a href="/{{auth()->user()->auth}}" class="btn bg-white-blue text-light btn-primary fw-bold" style="z-index: 100">Dashboard</a>
              @endguest
            </div>
        </div>
    </div>
  </div>
@endsection