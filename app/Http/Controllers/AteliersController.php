<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atelier;

class AteliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ateliers = Atelier::all();

        return view('ateliers.index', ['ateliers' => $ateliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atelier = new Atelier();
        $atelier->libelle = $request->libelle;
        $atelier->effectif = $request->effectif;
        $atelier->commentaire = $request->commentaire;
        $atelier->save();
        return response()->json($atelier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atelier = Atelier::findOrFail($id);

        return view('atelier.show', ['atelier' => $atelier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $atelier = Atelier::findOrFail($id);
            $atelier->libelle = $request->libelle;
            $atelier->effectif = $request->effectif;
            $atelier->commentaire = $request->commentaire;
            $atelier->save();
            return response()->json($atelier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atelier = Atelier::findOrFail($id);
        $atelier->delete();

        return response()->json($atelier);
    }
}
