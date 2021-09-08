@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="callout callout-info">
        <h5><i class="fas fa-info"></i> Noter:</h5>
        Cette page a été améliorée pour l'impression. Cliquez sur le bouton d'impression en bas de la facture pour tester.
      </div>
      <!-- Main content -->
      <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fas fa-globe"></i> Pharmacie,
              <small class="float-right">Date: {{ date("Y-m-d") }}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            De
            <address>
              <strong>Pharmacie, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              Téléphone: (+224) {{ Auth::user()->phone }}<br>
              Email: {{ Auth::user()->email }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            À
            <address>
              <strong>{{ $clt->prenom.' '.$clt->nom }}</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              Téléphone: (+224) {{ $clt->phone }}<br>
              Email: {{ $clt->email }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Facture d'achat #{{ $clt->id+10020 }}</b><br>
            <br>
            <b>Numéro de commande:</b> 4F3S8J<br>
            <b>Paiement dû:</b> {{ $clt->created_at->format('Y-m-d') }}<br>
          </div>
          <!-- /.col -->
        </div><br>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>Produit</th>
                <th class="text-center" style="width:10%">Qty</th>
                <th>Prix</th>
                <th>Subtotal</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($show as $item)
                  <tr>
                    <td>{{ $item->commande }}</td>
                    <td class="text-center" style="width:10%">{{ $item->qty_d }}</td>
                    <td>{{ $item->price_d }} GNF</td>
                    <td>{{ $item->total_d }} GNF</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="lead">Montant dû {{ date("Y-m-d") }}</p>

            <div class="table-responsive">
              <table class="table">
                <tbody><tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>{{ $clt->total }} GNF</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>{{ $clt->total }} GNF</td>
                </tr>
              </tbody></table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <div class="row no-print">
          <div class="col-12">
            <button type="button" class="btn btn-success float-right"><i class="fas fa-print"></i> Imprimer
              Payment
            </button>
          </div>
        </div>
      </div>
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div>
  <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script>
@stop
