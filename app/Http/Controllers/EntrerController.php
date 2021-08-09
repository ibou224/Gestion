<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestFormEntrer;
use App\Models\Entrer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class EntrerController extends Controller
{
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
        return view('entrers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestFormEntrer $request)
    {
        $entre = new Entrer();
        $entre->libele = request('libele');
        $entre->prix_e = request('prix');
        $entre->fourn_id = request('fourn_id');
        $entre->id_user = Auth::user()->id;
        $entre->save();
        Flashy::message('Enregistrement effectué avec succès');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrer  $entrer
     * @return \Illuminate\Http\Response
     */
    public function show(Entrer $entrer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrer  $entrer
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrer $entrer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrer  $entrer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrer $entrer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrer  $entrer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrer $entrer)
    {
        //
    }
}
