<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestFormSortier;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Sortier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;
class SortierController extends Controller
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
        $sorties = Sortier::all();
        $clients = Client::all();
        return view('sortiers.index', compact('sorties','clients'));
    }

    public function show_vente($id)
    {
        $clt = Client::where('id',$id)->first();
        $show = DB::table('detaille_commande')
            ->where('id_clt',$id)->get();
        return view('sortiers.show_vente', compact('show','clt'));
    }

    public function show_print($id)
    {
        $clt = Client::where('id',$id)->first();
        $show = DB::table('detaille_commande')
            ->where('id_clt',$id)->get();
        return view('sortiers.print', compact('show','clt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sortiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestFormSortier $request)
    {
        $sortie = new Sortier();

        $prod = Produit::where('id',$request->id_prod)->first();
        if(request('quantite') > $prod->quantite){
           // dd('la quantite de '.$prod->nomP);
            Flashy::info('la quantite de '.$prod->nomP);
        }else{
            $prod->quantite -= request('quantite');
            $prod->update();

            $sortie->qty_sortie = request('quantite');
            $sortie->prix_sortie = request('prix');
            $sortie->id_prod = request('id_prod');
            $sortie->id_user = Auth::user()->id;
            $sortie->save();
            Flashy::message('Enregistrement effectué avec succès');
            return back();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sortier  $sortier
     * @return \Illuminate\Http\Response
     */
    public function show(Sortier $sortier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sortier  $sortier
     * @return \Illuminate\Http\Response
     */
    public function edit(Sortier $sortier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sortier  $sortier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sortier $sortier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sortier  $sortier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sortier $sortier)
    {
        //
    }
}
