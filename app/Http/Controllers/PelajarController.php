<?php

namespace App\Http\Controllers;

use App\Models\Pelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Soal;
use App\Models\User;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelajar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $kode = $_GET['kode'];
        
        $judul = Soal::where('kode', $kode)->get();
        
        if(isset($judul[0]))
        {
            $folder = User::where('id', $judul[0]['userId'])->get();
            $folder = $folder[0]['name'];
    
            $soal = file_get_contents("storage/". $folder ."/". $judul[0]['judul'] .".json");   
            $soal = json_decode($soal, true);
    
            return view('pelajar.soal', [
                "judul" => $soal['judul'],
                "kode" => $kode, 
                "jmlPG" => $soal['jmlPG'],
                "jmlEssai" => $soal['jmlEssai'],
                "soalPG" => $soal['soalPG'],
                "soalEssai" => $soal['soalEssai']
            ]);
        } else {
            return redirect('/pelajar')->with('errorCode', 'Soal tidak ditemukan, periksa kembali kode soal anda!');
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode = Soal::where('kode', $_POST['kode'])->get();

        $folder = User::where('id', $kode[0]['userId'])->get();
        $folder = $folder[0]['name'];

        $soal = file_get_contents("storage/". $folder ."/". $kode[0]['judul'] .".json");   
        $soal = json_decode($soal, true);

        $fileHasil = file_get_contents("storage/". $folder ."/hasil". $kode[0]['judul'] .".json");   
        $data = json_decode($fileHasil, true);

        $jawabanPG = [];
        $benar = 0;
        
        for($i = 1; $i <= $request->jmlPG; $i++ ) {
            $pg = "soal" . "$i";

            $jawabanPG[] = [
                "jawaban" => $request->$pg,
            ];
        };

        for($i = 1; $i <= $request->jmlEssai; $i++ ) {
            $essai = "essai" . "$i";

            $jawabanEssai[] = [
                "jawaban" => $request->$essai,
            ];
        };

        for($i = 0; $i < $request->jmlPG; $i++ ) {
            if($soal['soalPG'][$i]['key'] == $jawabanPG[$i]['jawaban']){
                $benar = $benar + 1;
            };
        }

        $data[] = [
            "nama" => auth()->user()->name,
            "email" => auth()->user()->email,
            "hasil" => $benar, 
            "pg" => $jawabanPG, 
            "essai" => $jawabanEssai
        ];

        Storage::disk('public')->put( $folder .'/hasil'. $kode[0]['judul'] .'.json', json_encode($data));
        return redirect('/pelajar')->with('done', 'Jawaban berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajar $pelajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelajar $pelajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelajar $pelajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelajar $pelajar)
    {
        //
    }
}
