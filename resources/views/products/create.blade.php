@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Ajouter un Produit</h1>
    <form action="{{ route('products.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix" name="prix" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection