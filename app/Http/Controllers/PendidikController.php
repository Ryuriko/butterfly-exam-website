<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Soal;
use Illuminate\Support\Collection;

class PendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soal = Soal::where('userId', auth()->user()->id)->get();

        return view('pendidik.index', [
            "soal" => $soal,
        ]);
    }

    public function init()
    {
        return view('pendidik.formInit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidik.formSoal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $soalPG = [];
        $soalEssai = [];
        $kode = mt_rand(1, 100000);

        for($i = 1; $i <= $request->jmlPG; $i++ ) {
            $pg = "pg" . "$i";
            $key = "key" . "$i";
            $A = "A" . "$i";
            $B = "B" . "$i";
            $C = "C" . "$i";
            $D = "D" . "$i";

            $soalPG[] = [
                "soal" => $request->$pg,
                "key" => $request->$key,
                "A" => $request->$A,
                "B" => $request->$B,
                "C" => $request->$C,
                "D" => $request->$D
            ];
        };

        for($i = 1; $i <= $request->jmlEssai; $i++) {
            $essai = "essai" . "$i";
            $soalEssai[] = [
                "soal" => $request->$essai
            ];
        };

        $data = [
            "judul" => $request->judul,
            "kode" => $kode,
            "jmlPG" => $request->jmlPG,
            "jmlEssai" => $request->jmlEssai,
            "soalPG" => $soalPG,
            "soalEssai" => $soalEssai,
            
        ];
        $hasil[] = [
            "nama" => "Nama",
            "email" => "Email",
            "hasil" => "Hasil"
        ];

        $soal = [
            "judul" => $request->judul,
            "kode" => $kode,
            "userId" => auth()->user()->id
        ];

        Storage::disk('public')->put( auth()->user()->name .'/'. $request->judul .'.json', json_encode($data));
        Storage::disk('public')->put( auth()->user()->name .'/hasil'. $request->judul .'.json', json_encode($hasil));

        Soal::create($soal);

        return redirect('/pendidik/' . $data['judul']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $judul)
    {   
        $soal = file_get_contents("storage/". auth()->user()->name ."/". $judul .".json");   
        $soal = json_decode($soal, true);

        $hasil = file_get_contents("storage/". auth()->user()->name ."/hasil". $judul .".json");   
        $hasil = json_decode($hasil, true);
        $hasil = collect($hasil);
        
        return view('pendidik.show', [
            "soal" => $hasil,
            "judul" => $soal['judul'],
            "kode" => $soal['kode']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
