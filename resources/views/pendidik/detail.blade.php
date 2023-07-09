{{-- @dd($user['name']) --}}
@extends('partials.main')

@section('content')
<section>
    <div class="row mx-0 py-5 justify-content-center align-items-center min-vh-100">
        <div class="col-11 text-bg-light rounded-5 p-5 my-4 rounded-5" style="z-index: 100;">
            <hr>
            <div class="row m-0 justify-content-between align-items-center">
                <div class="col-3">
                    <img  class="img-fluid rounded-5 mx-auto mb-4" src="{{ $user->picture !== Null ? asset('storage/' . $user->picture) : 'https://cdn.pixabay.com/photo/2015/08/19/21/25/butterfly-896668_1280.png' }}" width="50%">
                </div>
                <div class="col-3">
                    <p class="text-secondary uppercase">Nama: {{$user['name']}}</p>
                    <p class="text-secondary uppercase">Kode Identitas: {{$user['identity_code']}}</p>
                </div>
                <div class="col-3">
                    <p class="text-secondary uppercase">Email: {{$user['email']}}</p>
                    <p class="text-secondary uppercase">Instansi: {{$user['instansi']}}</p>    
                </div>
            </div>
            <hr>
        
            <h1 class="text-center text-primary uppercase">{{$soal['judul']}}</h1>

            <form>
                <h2 class="mb-3 text-primary">Pilihan Ganda</h2>
                @for ($i = 0; $i < $soal['jmlPG']; $i++)
                <p class="fs-5">{{$i+1 . '. ' . $soal['soalPG'][$i]['soal'] }}</p>
                <div class="row m-0 mb-4">
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="A" id="{{'A' . $i}}" disabled {{$hasil['pg'][$i]['jawaban'] === 'A' ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{'A' . $i}}">
                            A. {{$soal['soalPG'][$i]['A']}}
                        </label>
                    </div>
                    
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="B" id="{{'B' . $i}}" disabled {{$hasil['pg'][$i]['jawaban'] === 'B' ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{'B' . $i}}">
                            B. {{$soal['soalPG'][$i]['B']}}
                        </label>
                    </div>
                    
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="C" id="{{'C' . $i}}" disabled {{$hasil['pg'][$i]['jawaban'] === 'C' ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{'C' . $i}}">
                            C. {{$soal['soalPG'][$i]['C']}}
                        </label>
                    </div>
                    
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="D" id="{{'D' . $i}}" disabled {{$hasil['pg'][$i]['jawaban'] === 'D' ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{'D' . $i}}">
                            D. {{$soal['soalPG'][$i]['D']}}
                        </label>
                    </div>
                </div>
                @endfor

                <hr>
                <h2 class="mb-3 text-primary">Essai</h2>

                @for ($i = 0; $i < $soal['jmlEssai']; $i++)
                <div class="mb-3">
                    <label for="essai{{$i}}" class="form-label fs-5">{{$i+1 . '. ' . $soal['soalEssai'][$i]['soal'] }}</label>
                    <textarea class="form-control border border-dark" id="essai{{$i}}" rows="3" name="essai{{$i}}" disabled>{{$hasil['essai'][$i]['jawaban']}}</textarea>
                </div>
                @endfor
              </form>
              <div class="text-center pt-3">
                  <a href="/pendidik/{{$soal['judul']}}" class="btn btn-dark">Kembali</a>
              </div>
        </div>
    </div>
</section>
@endsection