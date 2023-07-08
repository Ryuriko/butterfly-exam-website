@extends('partials.main')

@section('content')
<section>
    <div class="row mx-0 py-5 justify-content-center align-items-center min-vh-100">
        <div class="col-11 text-bg-light rounded-5 p-5 my-4 rounded-5" style="z-index: 100;">
            <h1 class="text-center text-primary uppercase">{{$judul}}</h1>
            <form action="/pelajar" method="POST" name="formSoal">
                @csrf
                <h2 class="mb-3 text-primary">Pilihan Ganda</h2>
                @foreach ($soalPG as $soal)
                <p class="fs-5">{{$loop->iteration . '. ' . $soal['soal'] }}</p>
                <div class="row m-0 mb-4">
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="A" id="{{'A' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'A' . $loop->iteration}}">
                            A. {{$soal['A']}}
                        </label>
                    </div>
                    
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="B" id="{{'B' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'B' . $loop->iteration}}">
                            B. {{$soal['B']}}
                        </label>
                    </div>
                    
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="C" id="{{'C' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'C' . $loop->iteration}}">
                            C. {{$soal['C']}}
                        </label>
                    </div>
                    
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" value="D" id="{{'D' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'D' . $loop->iteration}}">
                            D. {{$soal['D']}}
                        </label>
                    </div>
                </div>
                @endforeach

                <hr>
                <h2 class="mb-3 text-primary">Essai</h2>

                @foreach ($soalEssai as $soal)
                <div class="mb-3">
                    <label for="essai{{$loop->iteration}}" class="form-label fs-5">{{$loop->iteration . '. ' . $soal['soal']}}</label>
                    <textarea class="form-control border border-dark" id="essai{{$loop->iteration}}" rows="3" name="essai{{$loop->iteration}}"></textarea>
                </div>
                @endforeach

                <input type="hidden" value="{{$_GET['kode']}}" name="kode">
                <input type="hidden" value="{{$jmlPG}}" name="jmlPG">
                <input type="hidden" value="{{$jmlEssai}}" name="jmlEssai">
                
                <div class="text-end pt-3">
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    let i = 0;
    window.onblur = function() {
        i = i + 1;
        alert("Anda telah membuka tab sebanyak : " + i + " kali, jika anda membuka 2 kali maka ulangan akan otomatis terkumpulkan!");
        if(i >= 2) {
            document.forms["formSoal"].submit();
        };    
    }
    
</script>
@endsection