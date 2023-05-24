<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        for($i = 1; $i <= $request->jmlPG; $i++ ) {
            $pg = "pg" . "$i";
            $A = "A" . "$i";
            $B = "B" . "$i";
            $C = "C" . "$i";
            $D = "D" . "$i";

            $soalPG[] = [
                "soal" => $request->$pg,
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
            "soalPG" => $soalPG,
            "soalEssai" => $soalEssai
        ];        

        Storage::disk('public')->put( auth()->user()->name .'/'. $request->judul .'.json', json_encode($data));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
