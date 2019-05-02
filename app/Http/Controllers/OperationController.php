<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operation;
use App\Ordre_fabrication;
use App\Produit;
use App\Poste_charge;
use App\Atelier;
use App\Client;
use App\audit;
use DB;


class OperationController extends Controller
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
        // $produits = Produit::all();
        // $operations = Operation::all();
        // $ordre_fabrications = Ordre_fabrication::all();

        // return view('profil_projet.index',compact('operations','ordre_fabrications', 'produits'));
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
        $operation = new Operation();
        $operation->num_operation = $request->num_operation;
        $operation->produit_id = $request->produit_id;
        $operation->atelier_id = $request->atelier_id;
        $operation->libelle_operation = $request->libelle_operation;
        $operation->poste_charge_id = $request->poste_charge_id;
        $operation->temps_preparation = $request->temps_preparation;
        $operation->temps_execution = $request->temps_execution;
        $operation->temps_transfert = $request->temps_transfert;
        $operation->h_debut = $request->h_debut;
        $operation->h_fin = $request->h_fin;
        $operation->commentaire = $request->commentaire;
        $operation->save();
        return response()->json($operation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = Operation::findOrFail($id);

        return view('profil_projet.show', ['operation' => $operation]);
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
            $operation = Operation::findOrFail($id);
            $operation->num_operation = $request->num_operation;
            $operation->produit_id = $request->produit_id;
            $operation->atelier_id = $request->atelier_id;
            $operation->poste_charge_id = $request->poste_charge_id;
            $operation->temps_preparation = $request->temps_preparation;
            $operation->temps_execution = $request->temps_execution;
            $operation->temps_transfert = $request->temps_transfert;
            $operation->libelle_operation = $request->libelle_operation;
            $operation->h_debut = $request->h_debut;
            $operation->h_fin = $request->h_fin;
            $operation->commentaire = $request->commentaire;
            $operation->save();
            return response()->json($operation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = Operation::findOrFail($id);
        $operation->delete();

        return response()->json($operation);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function showProduit($id)
    // {
    //     $produits = Produit::findOrFail($id);

    //     return view('profil_projet.show', ['produits' => $produits]);
    // }

    public function index2($id)
    {
        $produit = DB::table('produits')->where('id','=',$id)->first();


      
        $operations = Operation::all();
        $ordre_fabrications = Ordre_fabrication::all();
        $ateliers = Atelier::all();
        $clients = Client::all();
        $poste_charges = Poste_charge::all();

        $produit_date = audit::select(DB::raw("changetime"))
            ->where('produit_id','=',$id)
            ->get()->toArray();
        $produit_date = array_column($produit_date, 'changetime');

        $produit_pourcentage = audit::select(DB::raw("pourcentage"))
            ->where('produit_id','=',$id)
            ->get()->toArray();
        $produit_pourcentage = array_column($produit_pourcentage, 'pourcentage');

       

        return view('profil_projet.index',['produit' => $produit,'operations' => $operations,'ordre_fabrications' => $ordre_fabrications,'ateliers' => $ateliers, 'poste_charges' => $poste_charges, 'clients' => $clients])
        ->with('produit_date',json_encode($produit_date,JSON_NUMERIC_CHECK))
        ->with('produit_pourcentage',json_encode($produit_pourcentage,JSON_NUMERIC_CHECK));
    }

//     public function LineChart()
//     {
//         $produit_date = audit::select(DB::raw("changetime"))
//         ->get()->toArray();
//      $produit_date = array_column($produit_date, 'changetime');

//      $produit_pourcentage = audit::select(DB::raw("pourcentage"))
//         ->get()->toArray();
//      $produit_pourcentage = array_column($produit_pourcentage, 'pourcentage');
   
 
//    return view('acceuil')
//           ->with('produit_date',json_encode($produit_date,JSON_NUMERIC_CHECK))
//           ->with('produit_pourcentage',json_encode($produit_pourcentage,JSON_NUMERIC_CHECK));

        
//     }

}
