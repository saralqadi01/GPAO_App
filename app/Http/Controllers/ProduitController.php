<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Client;

class ProduitController extends Controller
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
        $produits = Produit::all();
        $clients = Client::all();

        return view('produits.index', ['produits' => $produits, 'clients' => $clients]);
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
        $produit = new Produit();
        $produit->libelle = $request->libelle;
        $produit->client_id = $request->client_id;
        $produit->pourcentage = $request->pourcentage;
        $produit->status = $request->status;
        $produit->date_debut = $request->date_debut;
        $produit->date_fin = $request->date_fin;
        $produit->save();
        return response()->json($produit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::findOrFail($id);

        return view('produit.show', ['produit' => $produit]);
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
            $produit = Produit::findOrFail($id);
            $produit->libelle = $request->libelle;
            $produit->client_id = $request->client_id;
            $produit->pourcentage = $request->pourcentage;
            $produit->status = $request->status;
            $produit->date_debut = $request->date_debut;
            $produit->date_fin = $request->date_fin;
            $produit->save();
            return response()->json($produit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return response()->json($produit);
    }
}
