@extends('partials.main')

@section('content')
<section>

    <div class="row text-light">
        <div class="col">
            <h2 class="fw-bold">Form Create Exam</h2>
        </div>
        <div class="col-auto">
            <a class="bg-white-blue rounded-3 px-3 py-1 nav-link fw-bold" href="/pendidik/init">Back</a>
        </div>
    </div>
    
    <div class="row m-0 px-2 px-sm-0 justify-content-center">
        <div class="col-auto bg-white-blue text-light p-5 my-5 rounded-5" style="z-index: 100;">
            <h1 class="text-center">{{$_GET['judul']}}</h1>
            <form action="/pendidik" method="POST">
                @csrf

                {{-- Pilihan Ganda --}}
                @for ($i = 1; $i <= $_GET['pg']; $i++)
                <div class="mb-3">
                    <label class="form-label fs-5 fw-bold" for="pg{{$i}}">Nomor {{$i}}</label>
                    <textarea class="form-control" id="pg{{$i}}" rows="3" name="pg{{$i}}"></textarea>
                </div>
                <div class="row m-0 mb-3">
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="A{{$i}}">A: </label>
                        <input class="form-control" type="text" name="A{{$i}}" id="A{{$i}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="B{{$i}}">B: </label>
                        <input class="form-control" type="text" name="B{{$i}}" id="B{{$i}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="C{{$i}}">C: </label>
                        <input class="form-control" type="text" name="C{{$i}}" id="C{{$i}}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label class="form-label" for="D{{$i}}">D: </label>
                        <input class="form-control" type="text" name="D{{$i}}" id="D{{$i}}">
                    </div>
                    <div class="col-auto mb-3">
                        <label class="form-label" for="key{{$i}}">Kunci Jawaban: </label>
                        <select class="form-select" id="key{{$i}}" name="key{{$i}}">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                    </div>
                </div>
                <hr>
                @endfor

                {{-- Essai --}}
                @for ($i = 1; $i <= $_GET['essai']; $i++)
                <div class="mb-3">
                    <label for="essai{{$i}}" class="form-label">Essai {{ $i }}</label>
                    <textarea class="form-control" id="essai{{$i}}" rows="3" name="essai{{$i}}"></textarea>
                </div>
                @endfor
                
                <div class="text-center pt-3">
                    <button type="submit" class="btn bg-dark-blue text-light fw-bold">Buat Soal</button>
                </div>

                {{-- Hidden data --}}
                <input type="hidden" value="{{$_GET['pg']}}" name="jmlPG">
                <input type="hidden" value="{{$_GET['essai']}}" name="jmlEssai">
                <input type="hidden" value="{{$_GET['judul']}}" name="judul">
                <input type="hidden" value="{{$_GET['time']}}" name="time">
            </form>
        </div>
    </div>
</section>
@endsection