@extends('partials.main')

@section('content')
<section>

    <div class="row text-light">
        <div class="col">
            <h2 class="fw-bold">Exam</h2>
        </div>
    </div>

    <div class="row mx-0 py-5 justify-content-center">
        <div class="col-11 text-bg-light text-white-blue rounded-5 p-5 my-4 rounded-5" style="z-index: 100;">
            <h1 class="text-center mb-3">{{$judul}}</h1>
            <p class="text-dark" id="waktu"></p>
            <form action="/pelajar" method="POST" name="formSoal">
                @csrf
                <h2 class="mb-3">Pilihan Ganda</h2>
                @foreach ($soalPG as $soal)
                <p class="fs-5">{{$loop->iteration . '. ' . $soal['soal'] }}</p>
                <div class="row m-0 mb-4">
                    <div class="col-12 col-sm-6 form-check">
                        <input class="form-check-input" type="radio" value="A" id="{{'A' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'A' . $loop->iteration}}">
                            A. {{$soal['A']}}
                        </label>
                    </div>
                    
                    <div class="col-12 col-sm-6 form-check">
                        <input class="form-check-input" type="radio" value="B" id="{{'B' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'B' . $loop->iteration}}">
                            B. {{$soal['B']}}
                        </label>
                    </div>
                    
                    <div class="col-12 col-sm-6 form-check">
                        <input class="form-check-input" type="radio" value="C" id="{{'C' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'C' . $loop->iteration}}">
                            C. {{$soal['C']}}
                        </label>
                    </div>
                    
                    <div class="col-12 col-sm-6 form-check">
                        <input class="form-check-input" type="radio" value="D" id="{{'D' . $loop->iteration}}" name="{{'soal' . $loop->iteration}}">
                        <label class="form-check-label" for="{{'D' . $loop->iteration}}">
                            D. {{$soal['D']}}
                        </label>
                    </div>
                </div>
                @endforeach

                <hr>
                <h2 class="mb-3">Essai</h2>

                @foreach ($soalEssai as $soal)
                <div class="mb-3">
                    <label for="essai{{$loop->iteration}}" class="form-label fs-5">{{$loop->iteration . '. ' . $soal['soal']}}</label>
                    <textarea class="form-control rounded-3" id="essai{{$loop->iteration}}" rows="3" name="essai{{$loop->iteration}}"></textarea>
                </div>
                @endforeach

                <input type="hidden" value="{{$_GET['kode']}}" name="kode">
                <input type="hidden" value="{{$jmlPG}}" name="jmlPG">
                <input type="hidden" value="{{$jmlEssai}}" name="jmlEssai">
                
                <div class="text-center pt-3">
                    <button type="submit" class="btn bg-dark-blue text-light fw-bold btn-primary" script="i = 5">Finish</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

    var countDownDate =  new Date().getTime() + {{$waktu}};

    var x = setInterval(function() {

    var now = new Date().getTime();    
    var distance = countDownDate - now;
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
   
    document.getElementById("waktu").innerHTML = "Waktu pengerjaan: " + hours + " jam, "
   + minutes + " menit, " + seconds + " detik ";

       if (distance < 0) {
         clearInterval(x);
         document.forms["formSoal"].submit();
       }
    }, 1000);

     let i = 0;
     window.onblur = function() {
         i = i + 1;
 	if(i < 2) {
             alert("Anda telah membuka tab sebanyak : " + i + " kali, jika anda membuka sekali lagi maka ulangan akan otomatis terkumpulkan!");
         }
         else if(i >= 2) {
             document.forms["formSoal"].submit();
         };    
     }

    
</script>
@endsection