<?php

namespace App\Http\Controllers;

use App\Models\Pelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Soal;

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

        $kode = Soal::where('kode', $_GET['kode'])->get();

        $soal = file_get_contents("storage/". auth()->user()->name ."/". $kode[0]['judul'] .".json");   
        $soal = json_decode($soal, true);

        return view('pelajar.soal', [
            "judul" => $soal['judul'],
            "kode" => $kode, 
            "jmlPG" => $soal['jmlPG'],
            "jmlEssai" => $soal['jmlEssai'],
            "soalPG" => $soal['soalPG'],
            "soalEssai" => $soal['soalEssai']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode = Soal::where('kode', $_POST['kode'])->get();

        $soal = file_get_contents("storage/". auth()->user()->name ."/". $kode[0]['judul'] .".json");   
        $soal = json_decode($soal, true);

        $soalPG = [];
        $soalEssai = [];
        
        for($i = 1; $i <= $request->jmlPG; $i++ ) {

            $soalPG[] = [
                "soal" => $request->$pg,
                "key" => $request->$key,
                "A" => $request->$A,
                "B" => $request->$B,
                "C" => $request->$C,
                "D" => $request->$D
            ];
        };
        
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
