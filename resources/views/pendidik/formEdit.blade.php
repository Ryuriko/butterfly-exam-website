@extends('partials.main')

@section('content')
<section>

    <div class="row text-light">
        <div class="col">
            <h2 class="fw-bold">Edit Exam</h2>
        </div>
        <div class="col-auto">
            <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/pendidik/{{$judul}}">Back</a>
        </div>
    </div>

    <div class="row m-0 px-2 px-sm-0 justify-content-center text-light">
        <div class="col-auto bg-white-blue p-5 my-5 rounded-5" style="z-index: 100;">
            <h1 class="text-center">{{$judul}}</h1>
            <form action="/pendidik/{{$kode}}" method="POST">
                @csrf
                @method('PUT')

                {{-- Pilihan Ganda --}}
                @foreach ($soalPG as $soal)
                <div class="mb-3">
                    <label class="form-label fs-5 fw-bold" for="pg{{$loop->iteration}}">Nomor {{$loop->iteration}}</label>
                    <textarea class="form-control" id="pg{{$loop->iteration}}" rows="3" name="pg{{$loop->iteration}}">{{$soal['soal']}}</textarea>
                </div>
                <div class="row m-0 mb-3">
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="A{{$loop->iteration}}">A: </label>
                        <input class="form-control" type="text" name="A{{$loop->iteration}}" id="A{{$loop->iteration}}" value="{{$soal['A']}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="B{{$loop->iteration}}">B: </label>
                        <input class="form-control" type="text" name="B{{$loop->iteration}}" id="B{{$loop->iteration}}" value="{{$soal['B']}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="C{{$loop->iteration}}">C: </label>
                        <input class="form-control" type="text" name="C{{$loop->iteration}}" id="C{{$loop->iteration}}" value="{{$soal['C']}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="D{{$loop->iteration}}">D: </label>
                        <input class="form-control" type="text" name="D{{$loop->iteration}}" id="D{{$loop->iteration}}" value="{{$soal['D']}}">
                    </div>
                    <div class="col-auto mb-3">
                        <label class="form-label" for="key{{$loop->iteration}}">Kunci Jawaban: </label>
                        <select class="form-select" id="key{{$loop->iteration}}" name="key{{$loop->iteration}}">
                            <option value="{{$soal['key']}}" selected>{{$soal['key']}}</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                    </div>
                </div>
                <hr>
                @endforeach

                {{-- Essai --}}
                @foreach ($soalEssai as $soal)
                <div class="mb-3">
                    <label for="essai{{$loop->iteration}}" class="form-label">Essai {{ $loop->iteration }}</label>
                    <textarea class="form-control" id="essai{{$loop->iteration}}" rows="3" name="essai{{$loop->iteration}}">{{$soal['soal']}}</textarea>
                </div>
                @endforeach
                
                <div class="text-center">
                    <button type="submit" class="btn bg-dark-blue text-light fw-bold">Update</button>
                </div>

                {{-- Hidden data --}}
                <input type="hidden" value="{{$jmlPG}}" name="jmlPG">
                <input type="hidden" value="{{$jmlEssai}}" name="jmlEssai">
                <input type="hidden" value="{{$judul}}" name="judul">
            </form>
        </div>
    </div>
</section>
@endsection