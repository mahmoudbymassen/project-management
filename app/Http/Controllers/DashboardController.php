<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Afficher le tableau de bord
     */
    public function index()
    {
        return view('dashboard'); // Assurez-vous que la vue "dashboard.blade.php" existe
    }
}