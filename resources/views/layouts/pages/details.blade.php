@extends('layouts.app')

@section('content')
    <div class="container" style="padding: px;">
        <div class="col-xs-12 table-responsive" style="margin-left: 70px;">
            <p><h3 style="text-decoration: underline;">Détails du Produit</h3></p>
            <table class="table table-bordered table-striped" border="1">
                <tr>
                    <th>PRODUIT</th>
                    <td>{{ $produit->nom_produit }}</td>
                </tr>
                <tr>
                    <th>DESCRIPTION</th>
                    <td>{{ $produit->description }}</td>
                </tr>
                <tr>
                    <th>PRIX</th>
                    <td>{{ $produit->prix }}</td>
                </tr>
                <tr>
                    <th>NOUVEAU PRIX </th>
                    <td>{{ $produit->nouveau_prix }}</td>
                </tr>
                <tr>
                    <th>TEMPLATE</th>
                    <td>{{ $produit->template_id }}</td>
                </tr>
               
                <tr>
                    <th>Statut</th>
                    <td><strong class="badge bg-warning">{{ $produit->statut }}</strong></td>
                </tr>
            </table>

            <div class="col-xs-12 no-print" style="display: flex; justify-content: space-between;">
                <a href="{{ route('produit.index') }}" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Retour</a>
            </div>
        </div>
    </div>
@endsection
