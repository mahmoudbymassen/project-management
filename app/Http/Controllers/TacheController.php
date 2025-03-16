<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Projet;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    // Afficher la liste des tâches
    public function index()
    {
        $taches = Tache::all();
        $projets = Projet::all();
        return view('taches.index', compact('taches', 'projets'));
    }

    // Enregistrer une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'nullable',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'projet_id' => 'required|exists:projets,id',
        ]);

        Tache::create($request->all());

        return redirect()->route('taches.index')->with('success', 'Tâche créée avec succès.');
    }

    // Supprimer une tâche
    public function destroy(Projet $projet, Tache $tache)
{
    // Supprimer la tâche
    $tache->delete();

    // Rediriger avec un message de succès
    return redirect()->route('projets.show', $projet->id)
                    ->with('success', 'Tâche supprimée avec succès.');
}
}