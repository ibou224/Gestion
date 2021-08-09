@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Enregistrement des stocks</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('save-stock')}} " method="POST">
          	@csrf
            <div class="card-body">
              <div class="form-group">
                <label for="quantite">Quantite</label>
                <input type="number" min="1" class="form-control @error('quantite') is-invalid @enderror" name="quantite" value="{{ old('quantite') }}" placeholder="Saisir la Quntite">

                @error('quantite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

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
