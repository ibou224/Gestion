@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-7">
        <div class="card">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">Liste des categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Categorie</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $cate)
                <tr>
                    <td>{{ $cate->categorie }}</td>
                    <td>X</td>
                    </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
    @include('categories.create')
</div>
@stop
