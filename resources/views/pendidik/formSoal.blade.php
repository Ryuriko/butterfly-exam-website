@extends('partials.main')

@section('content')
<section class="text-bg-dark">
    <div class="row m-0 justify-content-center">
        <div class="col-auto bg-secondary p-5">
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
                
                <div class="text-end">
                    <button type="submit" class="btn btn-dark fw-bold">Buat Soal</button>
                </div>

                {{-- Hidden data --}}
                <input type="hidden" value="{{$_GET['pg']}}" name="jmlPG">
                <input type="hidden" value="{{$_GET['essai']}}" name="jmlEssai">
                <input type="hidden" value="{{$_GET['judul']}}" name="judul">
            </form>
        </div>
    </div>
</section>
@endsection