@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-8">
        <div class="card">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">Detail de la commande</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('detailComd') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h3>Info client :</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" placeholder="Saisir le nom">
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" placeholder="Saisir prenom">
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Saisir téléphone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisir le email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" placeholder="Saisir le adresse">

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
                    @php
                      $some = DB::table('commandes')->sum('total');
                    @endphp
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th class="text-center">Quantite</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Commande::all() as $comd)
                            <tr>
                                <td>{{ $comd->produits->nomP }}</td>
                                <td>{{ $comd->price_c }}</td>
                                <td>{{ $comd->qty_c }}</td>
                                <td class="text-center">{{ $comd->total }}</td>
                                <td class="text-center"></td>
                            </tr>
                            @endforeach
                            <tr style="background-color: rgb(189, 184, 184)">
                                <th colspan="3">Total</th>
                                <td colspan="2">{{ $some }} GNF</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Valider la commande</button>
                  </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Commande</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('commande-store') }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="id_prod">Produit</label>
                  <select type="text" class="form-control @error('id_prod') is-invalid @enderror" name="id_prod" value="{{ old('id_prod') }}">
                      @foreach (App\Models\Produit::all() as $prod )
                      <option value="{{ $prod->id }}">{{ $prod->nomP }}</option>
                      @endforeach
                  </select>
                  @error('id_prod')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="quantite">Quantite</label>
                    <input type="number" min="1" class="form-control @error('quantite') is-invalid @enderror" name="quantite" value="{{ old('quantite') }}" placeholder="Saisir la Quntite">

                    @error('quantite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>


              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Ajouter</button>
              </div>
            </form>
          </div>
    </div>
</div>
@stop
