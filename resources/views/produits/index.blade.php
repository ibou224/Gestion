@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des produits</h3>
                <a href="{{ route('create-prod') }}" class="btn btn-primary float-rigth m-2">
                    <i class="fas fa-plus">Ajouter</i>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Categorie</th>
                  <th>Produit</th>
                  <th>Prix</th>
                  <th>Quantite</th>
                  <th>Date d'expiration</th>
                  <th>Fournisseur</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($produits as $prod)
                <tr>
                    <td>{{ $prod->cate->categorie }}</td>
                    <td>{{ $prod->nomP }}</td>
                    <td>{{ $prod->prix }}</td>
                    @if ($prod->quantite <=0)
                    <td class="text-center" style="background-color: rgb(231, 76, 76)">{{ $prod->quantite }}</td>
                    @else
                    <td class="text-center" style="background-color: rgb(156, 238, 108)">{{ $prod->quantite }}</td>
                    @endif
                    @if (strtotime(date('Y-m-d')) >= strtotime($prod->dateExp) )
                    <td class="text-center" style="background-color: rgb(231, 76, 76)">{{$prod->dateExp }}</td>
                    @else
                    <td class="text-center">{{$prod->dateExp }}</td>
                    @endif
                    <td>{{$prod->fourn->prenom_f.' '.$prod->fourn->nom_f }}</td>
                    <td></td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>
@stop
