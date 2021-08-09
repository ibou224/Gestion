<div class="col-md-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Enregistrement des categories</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('save-categorie')}} " method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="categorie">Categorie</label>
            <input type="text" class="form-control @error('categorie') is-invalid @enderror" name="categorie" value="{{ old('categorie') }}" placeholder="Saisir une categorie">

            @error('categorie')
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

