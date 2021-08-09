@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Enregistrement des Produits</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('save-prod')}} " method="POST">
          	@csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nomP">Produit</label>
                <input type="text" class="form-control @error('nomP') is-invalid @enderror" name="nomP" value="{{ old('nomP') }}" placeholder="Saisir le produit">

                @error('nomP')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" placeholder="Saisir le prix">

                @error('prix')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="quantite">Quantite</label>
                <input type="number" min="1" class="form-control @error('quantite') is-invalid @enderror" name="quantite" value="{{ old('quantite') }}" placeholder="Saisir la quantite">

                @error('quantite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="dateExp">Date d'expiration</label>
                <input type="date" class="form-control @error('dateExp') is-invalid @enderror" name="dateExp" value="{{ old('dateExp') }}" placeholder="Saisir le dateExp">

                @error('dateExp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="id_cat">Categorie</label>
                <select type="text" class="form-control @error('id_cat') is-invalid @enderror" name="id_cat" value="{{ old('id_cat') }}">
                    @foreach (App\Models\Categorie::all() as $cate )
                    <option value="{{ $cate->id }}">{{ $cate->categorie }}</option>
                    @endforeach
                </select>
                @error('id_cat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="fourn_id">Fournisseur</label>
                <select type="text" class="form-control @error('fourn_id') is-invalid @enderror" name="fourn_id" value="{{ old('fourn_id') }}">
                    @foreach (App\Models\Fournisseur::all() as $fourn )
                    <option value="{{ $fourn->id }}">{{ $fourn->nom_f }}</option>
                    @endforeach
                </select>
                @error('fourn_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
</div>
@stop
