@extends('partials.main')

@section('content')

  <div class="row text-light">
    <div class="col">
         <h2 class="fw-bold">Edit Exam</h2>
     </div>
     <div class="col-auto">
         <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/profile">Back</a>
     </div>
  </div>

  <div class="containers-fluid">
    <div class="row m-0 py-3 py-sm0 justify-content-around align-items-center min-vh-100">
        <div class="col-12 col-sm-auto mb-auto mb-md-0 text-center">
            <div class="">
        	<img class="img-fluid mt-3 w-25" src="{{auth()->user()->picture !== Null ? asset('/storage/' . auth()->user()->picture) : 'https://cdn.pixabay.com/photo/2015/08/19/21/25/butterfly-896668_1280.png'}}">
            </div>
            <div class="bg-white-blue text-light rounded-5 p-3 p-md-5 m-md-5 m-3 mt-0">
            <form action="/profile/{{$user->id}}" method="POST" style="z-index: 100;" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="row m-0">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control p-3 @error('name')is-invalid @enderror" id="name" name="name" autofocus required value="{{old('name', $user->name)}}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="identity_code" class="form-label">Identity Code</label>
                        <input type="text" class="form-control p-3 @error('identity_code')is-invalid @enderror" id="identity_code" name="identity_code" autofocus required value="{{old('identity_code', $user->identity_code)}}">
                        @error('identity_code')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="instansi" class="form-label">Instantion</label>
                        <input type="text" class="form-control p-3 @error('instansi')is-invalid @enderror" id="instansi" name="instansi" value="{{old('instansi', $user->instansi)}}" required>
                        @error('instansi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                      <label class="form-label" for="auth">As</label>
                      <select class="form-select border p-3" id="auth" name="auth" disabled>
                          <option value="{{$user->auth}}" selected>{{$user->auth}}</option>
                        </select>
                        @error('auth')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control p-3 @error('email')is-invalid @enderror" id="email" name="email" value="{{old('email', $user->email)}}" disabled>
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control p-3 @error('picture')is-invalid @enderror" id="picture" name="picture">
                        @error('picture')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-auto mx-auto text-center mt-3">
                      <button class="btn fw-bold text-light bg-dark-blue" type="submit">Update</button>
                    </div>
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