@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">Liste des Ventes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th width="20%" class="text-center">Téléphone</th>
                  <th>Montant</th>
                  <th width="10%">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $sort)
                <tr>
                    <td>{{ $sort->nom }}</td>
                    <td>{{ $sort->prenom }}</td>
                    <td class="text-center">{{ $sort->phone }}</td>
                    <td>{{ $sort->total }}</td>
                    <td>
                        <a href="{{ route('show-print',$sort->id) }}" class="btn btn-success btn-xs"><i class="fas fa-print"></i></a>
                        <a href="{{ route('show-vente',$sort->id) }}" class="btn btn-info btn-xs"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>
@stop
