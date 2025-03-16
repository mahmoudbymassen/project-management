@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Projets</h1>
    <a href="{{ route('projets.create') }}" class="btn btn-primary">Créer un Projet</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projets as $projet)
            <tr>
                <td>{{ $projet->nom }}</td>
                <td>{{ $projet->description }}</td>
                <td>{{ $projet->date_debut }}</td>
                <td>{{ $projet->date_fin }}</td>
                <td>
                    <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection