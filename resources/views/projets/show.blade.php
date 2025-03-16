@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Projet</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $projet->nom }}</h5>
            <p class="card-text">{{ $projet->description }}</p>
            <p class="card-text"><strong>Date de Début:</strong> {{ $projet->date_debut }}</p>
            <p class="card-text"><strong>Date de Fin:</strong> {{ $projet->date_fin }}</p>
            <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection