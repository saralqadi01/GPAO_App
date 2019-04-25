<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poste_charge;

class Poste_chargesController extends Controller
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
        $poste_charges = Poste_charge::all();

        return view('poste_charges.index', ['poste_charges' => $poste_charges]);
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
        $poste_charges = new Poste_charge();
        $poste_charges->id_operation = $request->id_operation;
        $poste_charges->num_section = $request->num_section;
        $poste_charges->num_soussection = $request->num_soussection;
        $poste_charges->machine = $request->machine;
        $poste_charges->main_oeuvre = $request->main_oeuvre;
        $poste_charges->designation = $request->designation;
        $poste_charges->taux_horaire_forfait = $request->taux_horaire_forfait;
        $poste_charges->nbre_poste = $request->nbre_poste;
        $poste_charges->capacité_nominale = $request->capacité_nominale;
        $poste_charges->commentaire = $request->commentaire;
        $poste_charges->save();
        return response()->json($poste_charges);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poste_charges = Poste_charge::findOrFail($id);

        return view('poste_charges.show', ['poste_charges' => $poste_charges]);
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
        $poste_charges = Poste_charge::findOrFail($id);
        $poste_charges->id_operation = $request->id_operation;
        $poste_charges->num_section = $request->num_section;
        $poste_charges->num_soussection = $request->num_soussection;
        $poste_charges->machine = $request->machine;
        $poste_charges->main_oeuvre = $request->main_oeuvre;
        $poste_charges->designation = $request->designation;
        $poste_charges->taux_horaire_forfait = $request->taux_horaire_forfait;
        $poste_charges->nbre_poste = $request->nbre_poste;
        $poste_charges->capacité_nominale = $request->capacité_nominale;
        $poste_charges->commentaire = $request->commentaire;
        $poste_charges->save();
        return response()->json($poste_charges);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poste_charges = Poste_charge::findOrFail($id);
        $poste_charges->delete();

        return response()->json($poste_charges);
    }
}
