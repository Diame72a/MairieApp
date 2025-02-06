<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Arrete;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Afficher toutes les catégories
    public function index()
    {
        $categories = Category::all();  // Récupère toutes les catégories
        return view('categories.index', compact('categories'));
    }

    // Afficher les arrêtés d'une catégorie
    public function show($categoryId)
{
    $category = Category::findOrFail($categoryId);
    $arretes = Arrete::where('category_id', $categoryId)->get();
    return view('arretes.index', compact('arretes', 'category'));
}

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function home()
{
    $categories = Category::all();  // Récupérer toutes les catégories
    return view('admin.categories.index', compact('categories')); // Passer les catégories à la vue
}

    // Afficher le formulaire de création d'une nouvelle catégorie
    public function create()
    {
        return view('admin.categories.create');
    }

    // Enregistrer une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'emoji' => $request->emoji,
        ]);

        return redirect()->route('admin.categories.home')->with('success', 'Catégorie ajoutée avec succès.');
    }

    // Afficher un formulaire pour modifier une catégorie existante
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Mettre à jour une catégorie existante
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
            'emoji' => $request->emoji,
        ]);

        return redirect()->route('admin.categories.home')->with('success', 'Catégorie mise à jour avec succès.');
    }

    // Supprimer une catégorie
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.home')->with('success', 'Catégorie supprimée avec succès.');
    }
}
