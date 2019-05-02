<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use DB;

class AcceuilController extends Controller
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
        $produit = Produit::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function chartjs()
    {
        //   $produit = Produit::select(DB::raw("SUM(id) as count"))
        //      ->orderBy("created_at")
        //      ->groupBy("date_debut")
        //      ->get()->toArray();
        //   $produit = array_column($produit, 'count');

            $produit_libelle = Produit::select(DB::raw("libelle"))
               ->get()->toArray();
            $produit_libelle = array_column($produit_libelle, 'libelle');

            $produit_pourcentage = Produit::select(DB::raw("pourcentage"))
               ->get()->toArray();
            $produit_pourcentage = array_column($produit_pourcentage, 'pourcentage');

            // $produit_total = Produit::select(DB::raw("count(id)"))
            // ->get()->toArray();
          
            $produit_total = DB::table('produits')->count();
            $client_total = DB::table('clients')->count();
            $produit_new = DB::table('produits')
                ->select(DB::raw('count(*)'))
                ->where('status', '=', 'Nouveau')
                ->get();
        


          return view('acceuil')
                 ->with('produit_libelle',json_encode($produit_libelle,JSON_NUMERIC_CHECK))
                 ->with('produit_pourcentage',json_encode($produit_pourcentage,JSON_NUMERIC_CHECK))
                 ->with('client_total',json_encode($client_total,JSON_NUMERIC_CHECK))
                 ->with('produit_new',json_encode($produit_new,JSON_NUMERIC_CHECK))
                 ->with('produit_total',json_encode($produit_total,JSON_NUMERIC_CHECK));

       

        
    }

    public function total()
    {
        $produit_total = Produit::select(DB::raw("SUM(id) as count"))
            ->get()->toArray();

        return view('acceuil')
                ->with('produit_total',json_encode($produit_total,JSON_NUMERIC_CHECK));
    }

    
}
