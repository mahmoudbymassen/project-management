@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Tâches</h1>

    <div class="card mb-4">
        <div class="card-header">
            Créer une Tâche
        </div>
        <div class="card-body">
            <form action="{{ route('taches.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="date_debut">Date de Début</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="date_fin">Date de Fin</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="projet_id">Projet</label>
                    <select name="projet_id" id="projet_id" class="form-control" required>
                        @foreach ($projets as $projet)
                            <option value="{{ $projet->id }}">{{ $projet->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="est_terminee">Statut</label>
                    <select name="est_terminee" id="est_terminee" class="form-control">
                        <option value="0">En cours</option>
                        <option value="1">Terminée</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>

    <!-- Liste des tâches -->
    <div class="card">
        <div class="card-header">
            Liste des Tâches
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Projet</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taches as $tache)
                        <tr>
                            <td>{{ $tache->titre }}</td>
                            <td>{{ $tache->description }}</td>
                            <td>{{ $tache->date_debut }}</td>
                            <td>{{ $tache->date_fin }}</td>
                            <td>{{ $tache->projet->nom }}</td>
                            <td>{{ $tache->est_terminee ? 'Terminée' : 'En cours' }}</td>
                            <td>
                            <form action="{{ route('projets.taches.destroy', ['projet' => $projet->id, 'tache' => $tache->id]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">Supprimer</button>
</form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection