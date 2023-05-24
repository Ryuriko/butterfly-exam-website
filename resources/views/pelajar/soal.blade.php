@extends('partials.main')

@section('content')
<section>
    <div class="row mx-0 py-5 justify-content-center align-items-center min-vh-100 bg-dark">
        <div class="col-11 text-bg-light rounded-5 p-5">
            <form action="/pelajar" method="POST">
                @csrf

                <h2 class="mb-3">Pilihan Ganda</h2>
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
                <h2 class="mb-3">Essai</h2>

                @foreach ($soalEssai as $soal)
                <div class="mb-3">
                    <label for="essai{{$loop->iteration}}" class="form-label fs-5">{{$loop->iteration . '. ' . $soal['soal']}}</label>
                    <textarea class="form-control" id="essai{{$loop->iteration}}" rows="3" name="essai{{$loop->iteration}}"></textarea>
                </div>
                @endforeach
                <div class="text-end pt-3">
                    <button type="submit" class="btn btn-dark">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    // window.onblur = function() {
    //     alert("Please don't open new tab");
    // }
</script>
@endsection