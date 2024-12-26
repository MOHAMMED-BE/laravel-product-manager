@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Liste des Produits</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Ajouter un produit</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->nom }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->prix }} MAD</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        id="delete-form-{{ $product->id }}"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-product-id="{{ $product->id }}"
                            onclick="confirmDelete(this)">
                            Supprimer
                        </button>

                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Aucun produit trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(button) {
        const productId = button.getAttribute('data-product-id');
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: 'Cette action est irréversible !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }
</script>
@endsection