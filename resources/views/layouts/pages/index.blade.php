<?php
require_once app_path('Helpers/CurrencyHelper.php');
?>
@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <form action="{{ route('produit.index') }}" method="GET" class="mb-4">
        <div class="input-group shadow" style="width: 100%;">
            <input type="search" name="search" class="form-control rounded-pill border-0 bg-dark text-light" placeholder="Search" value="{{ request()->get('search') }}">
            <button class="btn btn-outline-secondary rounded-pill border-0 bg-dark text-light" type="button" onclick="clearSearch()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </form>

    <div class="card shadow-lg border-0 rounded-3 bg-dark text-light" style="width: 100%;">
        <div class="card-header bg-gradient-navy text-white d-flex justify-content-between align-items-center p-3">
            <h3 class="mb-0">Liste Des Produits</h3>
            <a href="{{ route('produit.create') }}" class="btn btn-neon btn-sm rounded-pill">Ajouter Produit</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover text-center align-middle mb-0 text-light w-100">
                <thead class="bg-navy text-white">
                    <tr>
                        <th>N°</th>
                        <th>Image</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Devise</th>
                        <th>Géolocalisation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $key => $produit)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @php
                                $images = is_array($produit->image_produit) ? $produit->image_produit : json_decode($produit->image_produit, true);
                            @endphp
                            @if(!empty($images) && isset($images[0]))
                                <img src="{{ asset('storage/images_produit/' . $images[0]) }}" alt="Product Image" class="img-thumbnail rounded-circle shadow-sm" style="width: 60px; height: 60px;">
                            @else
                                <span class="text-muted">No Image Available</span>
                            @endif  
                        </td>
                        <td>{{ $produit->nom_produit }}</td>
                        <td>{{ $produit->prix }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="badge bg-{{ strtolower($produit->statut) }} p-2">{{ $produit->statut }}</span>
                                <select class="form-select form-select-sm ms-2 shadow-sm bg-dark text-light border-0" data-produit-id="{{ $produit->id }}">
                                    <option value="APPROVED" {{ $produit->statut == 'APPROVED' ? 'selected' : '' }}>APPROVED</option>
                                    <option value="PENDING" {{ $produit->statut == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                    <option value="REJECTED" {{ $produit->statut == 'REJECTED' ? 'selected' : '' }}>REJECTED</option>
                                    <option value="DELIVERED" {{ $produit->statut == 'DELIVERED' ? 'selected' : '' }}>DELIVERED</option>
                                    <option value="DUPLICATED" {{ $produit->statut == 'DUPLICATED' ? 'selected' : '' }}>DUPLICATED</option>
                                </select>
                            </div>
                        </td>
                        <td>{{ currencySymbol($produit->devise) }}</td>
                        <td>
                            <img class="img-fluid rounded shadow-sm" id="flag-{{ $produit->id }}" data-country="{{ $produit->geo }}" style="width: 32px; height: 20px;">
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-outline-primary btn-sm shadow-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-outline-success btn-sm shadow-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <form id="deleteForm-{{ $produit->id }}" action="{{ route('produit.destroy', $produit->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-sm shadow-sm" onclick="confirmDelete({{ $produit->id }})" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                        <i class="fas fa-trash"></i> 
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-3">
                {{ $produits->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background: #121212;
        font-family: 'Roboto', sans-serif;
        color: #f8f9fa;
        margin: 0;
    }
    .input-group {
        border-radius: 30px;
        overflow: hidden;
        width: 100%;
    }
    .input-group input, .input-group button {
        border-radius: 30px;
        background-color: #1f1f1f;
        color: #f8f9fa;
    }
    .input-group input::placeholder {
        color: #a9a9a9;
    }
    .card {
        border-radius: 15px;
        background-color: #1f1f1f;
        width: 100%;
    }
    .card-header.bg-gradient-navy {
        background: linear-gradient(45deg, #000080, #001f3f);
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .bg-navy {
        background-color: #001f3f !important;
    }
    .table thead {
        background: linear-gradient(45deg, #000080, #001f3f);
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(29, 29, 29, 0.5);
    }
    .badge {
        font-size: 0.875rem;
        background: linear-gradient(45deg, #000080, #001f3f);
    }
    .btn-outline-primary:hover, .btn-outline-success:hover, .btn-outline-danger:hover {
        background-color: #fff;
        color: #000080;
        border-color: #000080;
    }
    .shadow-sm {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .btn-neon {
        color: #00ff00;
        border-color: #00ff00;
    }
    .btn-neon:hover {
        background-color: #00ff00;
        color: #000;
    }
    .rounded-circle {
        border-radius: 50%;
    }
    .rounded-pill {
        border-radius: 50px;
    }
    .table-hover tbody tr:hover {
        background-color: #2a2a2a;
    }
    .form-select {
        border: none;
        background: #1f1f1f;
        color: #f8f9fa;
    }
    .form-select:focus {
        border: none;
        box-shadow: none;
    }
    .tooltip-inner {
        background-color: #000080;
        color: #fff;
    }
    .tooltip.bs-tooltip-top .arrow::before, .tooltip.bs-tooltip-auto[x-placement^="top"] . arrow::before {
        border-top-color: #000080;
    }
</style>
@endsection

@section('scripts')
<script>
    function clearSearch() {
        document.querySelector('input[name="search"]').value = '';
        document.querySelector('form').submit();
    }

    document.addEventListener('DOMContentLoaded', () => {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'));
        tooltipTriggerList.map((tooltipTriggerEl) => {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    function confirmDelete(id) {
        if(confirm('Are you sure you want to delete this item?')) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
@endsection
