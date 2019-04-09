<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordre_fabrication;
use App\Produit;

class Ordre_fabricationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ordre_fabrication = new Ordre_fabrication();
        $ordre_fabrication->libelle = $request->libelle;
        $ordre_fabrication->produit_id = $request->produit_id;
        $ordre_fabrication->commentaire = $request->commentaire;
        $ordre_fabrication->save();
        return response()->json($ordre_fabrication);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordre_fabrication = Ordre_fabrication::findOrFail($id);

        return view('profil_projet.show', ['ordre_fabrication' => $ordre_fabrication]);
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
        $ordre_fabrication = Ordre_fabrication::findOrFail($id);
        $ordre_fabrication->libelle = $request->libelle;
        $ordre_fabrication->produit_id = $request->produit_id;
        $ordre_fabrication->commentaire = $request->commentaire;
        $ordre_fabrication->save();
        return response()->json($ordre_fabrication);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordre_fabrication = Ordre_fabrication::findOrFail($id);
        $ordre_fabrication->delete();

        return response()->json($ordre_fabrication);
    }
}
