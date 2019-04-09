<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
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
        $stocks = Stock::all();

        return view('stocks.index', ['stocks' => $stocks]);
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
        $stock = new Stock();
        $stock->reference = $request->reference;
        $stock->designation = $request->designation;
        $stock->nomenclature = $request->nomenclature;
        $stock->type = $request->type;
        $stock->unite = $request->unite;
        $stock->delai_semaine = $request->delai_semaine;
        $stock->prix_standard = $request->prix_standard;
        $stock->lot_reaprvs = $request->lot_reaprvs;
        $stock->stock_min = $request->stock_min;
        $stock->stock_max = $request->stock_max;
        $stock->save();
        return response()->json($stock);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);

        return view('stock.show', ['stock' => $stock]);
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
        $stock = Stock::findOrFail($id);
        $stock->reference = $request->reference;
        $stock->designation = $request->designation;
        $stock->nomenclature = $request->nomenclature;
        $stock->type = $request->type;
        $stock->unite = $request->unite;
        $stock->delai_semaine = $request->delai_semaine;
        $stock->prix_standard = $request->prix_standard;
        $stock->lot_reaprvs = $request->lot_reaprvs;
        $stock->stock_min = $request->stock_min;
        $stock->stock_max = $request->stock_max;
        $stock->save();
        return response()->json($stock);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return response()->json($stock);
    }
}
