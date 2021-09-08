@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">Liste des sorties</h3>
                <a href="{{ route('create-sortie') }}" class="btn btn-primary float-rigth m-2">
                    <i class="fas fa-plus">Ajouter</i>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Produit</th>
                  <th>Prix</th>
                  <th>Quantite</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($entrers as $entrer)
                <tr>
                    <td>{{ $entrer->Fourn->prenom_f.' '.$entrer->Fourn->nom_f }}</td>
                    <td>{{ $entrer->libele }}</td>
                    <td>{{ $entrer->qty_e }}</td>
                    <td>{{ $entrer->prix_e }}</td>
                    <td></td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>
@stop
