@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">Liste des fournisseurs</h3>
                <a href="{{ route('create-fourn') }}" class="btn bg-gradient-success float-right">
                    <i class="fas fa-plus"></i> Ajouter
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Prénom et Nom</th>
                  <th>Adresse</th>
                  <th>Téléphone</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($fourns as $fourn)
                <tr>
                    <td>{{ $fourn->prenom_f.' '.$fourn->nom_f }}</td>
                    <td>{{ $fourn->adresse_f }}</td>
                    <td>{{ $fourn->phone_f }}</td>
                    <td>{{ $fourn->email_f }}</td>
                    <td></td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>
@stop
