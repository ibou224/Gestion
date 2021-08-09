@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Enregistrement des Fournisseurs</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('save-fourn')}} " method="POST">
          	@csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nom_f">Nom</label>
                <input type="text" class="form-control @error('nom_f') is-invalid @enderror" name="nom_f" value="{{ old('nom_f') }}" placeholder="Saisir le nom_f">

                @error('nom_f')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control @error('prenom_f') is-invalid @enderror" name="prenom_f" value="{{ old('prenom_f') }}" placeholder="Saisir le prenom_f">

                @error('prenom_f')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="adresse_f">Adresse</label>
                <input type="text" class="form-control @error('adresse_f') is-invalid @enderror" name="adresse_f" value="{{ old('adresse_f') }}" placeholder="Saisir le adresse_f">

                @error('adresse_f')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="phone_f">Téléphone</label>
                <input type="text" class="form-control @error('phone_f') is-invalid @enderror" name="phone_f" value="{{ old('phone_f') }}" placeholder="Saisir le phone_f">

                @error('phone_f')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email_f">Email</label>
                <input type="email" class="form-control @error('email_f') is-invalid @enderror" name="email_f" value="{{ old('email_f') }}" placeholder="Saisir le email">

                @error('email_f')
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
