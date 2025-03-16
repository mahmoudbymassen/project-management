@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Projet</h1>
    <form action="{{ route('projets.update', $projet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom du Projet</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $projet->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $projet->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $projet->date_debut }}" required>
        </div>
        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $projet->date_fin }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection