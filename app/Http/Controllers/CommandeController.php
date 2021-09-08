<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestFormCommande;
use App\Http\Requests\RequestFormDetailCommande;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class CommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sortiers.commande');
    }

    public function store(RequestFormCommande $request)
    {
        $prod = Produit::find(request('id_prod'));
        $comd = new Commande();
        $exit = DB::table('commandes')->where('produit','=',$request->id_prod)->first();

        if ($exit) {
            Flashy::message('ce produit est déjà ajouté');
            return back();
        } else {
            $comd->produit = request('id_prod');
            $comd->price_c = $prod->prix;
            $comd->qty_c = request('quantite');
            $comd->total = request('quantite') * $prod->prix;
            $result = $comd->save();
            if($result){
                Flashy::message('la commande est ajouté avec effectué avec succès');
                return back();
            }else{
                Flashy::error("erreur de la commande");
                return back();
            }
        }




    }

    public function detailComd(RequestFormDetailCommande $request)
    {

        $command = Commande::all();
        $detail = array();
        $some = DB::table('commandes')->sum('total');

        $client = new Client();
        $client->nom = request('nom');
        $client->prenom = request('prenom');;
        $client->phone = request('phone');
        // $client->adresse = request('adresse');
        // $client->email = request('email');
        $client->total = $some;
        $client->save();

        foreach($command as $cmd){

            $detail['id_clt'] = $client->id;
            $detail['commande'] = $cmd->produits->nomP;
            $detail['price_d'] =  $cmd->price_c;
            $detail['qty_d'] =  $cmd->qty_c;
            $detail['total_d'] = $cmd->total;

            DB::table('detaille_commande')
                    ->insert($detail);
        }

        DB::table('commandes')->where('created_at','<',Carbon::now())->delete();


        Flashy::message('la commande est ajouté avec effectué avec succès');
        return back();


    }
}
