@extends('partials.main')

@section('content')
<section>
    <div class="row m-0 px-2 px-sm-0 justify-content-center">
        <div class="col-auto text-bg-light p-5 my-5 rounded-5" style="z-index: 100;">
            <h1 class="text-center">{{$judul}}</h1>
            <form action="/pendidik/{{$kode}}" method="POST">
                @csrf
                @method('PUT')

                {{-- Pilihan Ganda --}}
                @foreach ($soalPG as $soal)
                <div class="mb-3">
                    <label class="form-label fs-5 fw-bold" for="pg{{$loop->iteration}}">Nomor {{$loop->iteration}}</label>
                    <textarea class="form-control border border-dark" id="pg{{$loop->iteration}}" rows="3" name="pg{{$loop->iteration}}">{{$soal['soal']}}</textarea>
                </div>
                <div class="row m-0 mb-3">
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="A{{$loop->iteration}}">A: </label>
                        <input class="form-control border border-dark" type="text" name="A{{$loop->iteration}}" id="A{{$loop->iteration}}" value="{{$soal['A']}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="B{{$loop->iteration}}">B: </label>
                        <input class="form-control border border-dark" type="text" name="B{{$loop->iteration}}" id="B{{$loop->iteration}}" value="{{$soal['B']}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="C{{$loop->iteration}}">C: </label>
                        <input class="form-control border border-dark" type="text" name="C{{$loop->iteration}}" id="C{{$loop->iteration}}" value="{{$soal['C']}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="D{{$loop->iteration}}">D: </label>
                        <input class="form-control border border-dark" type="text" name="D{{$loop->iteration}}" id="D{{$loop->iteration}}" value="{{$soal['D']}}">
                    </div>
                    <div class="col-auto mb-3">
                        <label class="form-label" for="key{{$loop->iteration}}">Kunci Jawaban: </label>
                        <select class="form-select border border-dark" id="key{{$loop->iteration}}" name="key{{$loop->iteration}}">
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
                    <textarea class="form-control border border-dark" id="essai{{$loop->iteration}}" rows="3" name="essai{{$loop->iteration}}">{{$soal['soal']}}</textarea>
                </div>
                @endforeach
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary fw-bold">Perbarui Soal</button>
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