<?php

namespace App\Http\Controllers;

use App\Models\Arrete;
use App\Models\Category;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Utilisez ce middleware pour garantir que seul un administrateur connecté puisse accéder au tableau de bord
    public function __construct()
    {
        $this->middleware('auth'); // Exige l'authentification
    }

    // La méthode index est responsable d'afficher le tableau de bord
    public function index()
    {
        // Total des arrêtés
        $totalArretes = Arrete::count();

        // Total des catégories
        $categories = Category::all();

        // Nombre d'arrêtés par catégorie
        $arretesByCategory = Category::withCount('arretes')->get();

        // Total des utilisateurs
        $totalUsers = User::count();

        // Derniers utilisateurs
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('totalArretes', 'categories', 'arretesByCategory', 'totalUsers', 'recentUsers'));
    }

}
