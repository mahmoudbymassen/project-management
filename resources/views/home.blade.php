@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de Bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Bienvenue, {{ Auth::user()->name }} !</h3>
                    <p>Vous êtes connecté à la plateforme de gestion des projets.</p>

                    <div class="mt-4">
                        <a href="{{ route('projets.index') }}" class="btn btn-primary btn-lg">Voir les Projets</a>
                        <a href="{{ route('taches.index') }}" class="btn btn-success btn-lg">Voir les Tâches</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection