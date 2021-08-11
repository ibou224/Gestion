@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des stocks</h3>
                <a href="{{ route('create-stock') }}" class="btn btn-primary float-rigth m-2">
                    <i class="fas fa-plus">Ajouter</i>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>Produit</th>
                  <th class="text-center">Quantité</th>
                  <th>Utilisateur</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->produit->nomP }}</td>
                    <td class="text-center" >{{ $stock->qty_s }}</td>
                    <td>{{ $stock->user->prenom.' '.$stock->user->nom }}</td>
                    <td></td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>
@stop
