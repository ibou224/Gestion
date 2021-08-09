@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Enregistrement des entres</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('save-entrer')}} " method="POST">
          	@csrf
            <div class="card-body">
              <div class="form-group">
                <label for="libele">Libelle</label>
                <input type="text" class="form-control @error('libele') is-invalid @enderror" name="libele" value="{{ old('libele') }}" placeholder="Saisir le Libele">

                @error('libele')
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
