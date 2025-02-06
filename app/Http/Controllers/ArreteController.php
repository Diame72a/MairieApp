<?php

namespace App\Http\Controllers;

use App\Models\Arrete;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ArreteController extends Controller
{
   public function index()
    {
        $arretes = Arrete::all();
        return view('admin.arretes.index', compact('arretes'));
    }

    public function create()
    {
        $categories = Category::all(); // Récupérer toutes les catégories
        return view('admin.arretes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:pdf|max:10240',
        ]);

        $filePath = $request->file('file')->store('uploads', 'public');

        Arrete::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.arretes.index')->with('success', 'Arrêté créé avec succès.');
    }

    public function show($id)
{
    $arrete = Arrete::findOrFail($id);
    return view('admin.arretes.show', compact('arrete'));
}

    public function edit(Arrete $arrete)
    {
        $categories = Category::all(); // Récupérer toutes les catégories
        return view('admin.arretes.edit', compact('arrete', 'categories'));
    }

    public function update(Request $request, Arrete $arrete)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Supprimer l'ancien fichier si nécessaire
            if ($arrete->file_path) {
                Storage::disk('public')->delete($arrete->file_path);
            }

            $filePath = $request->file('file')->store('uploads', 'public');
            $arrete->file_path = $filePath;
        }

        $arrete->title = $request->title;
        $arrete->category_id = $request->category_id;
        $arrete->save();

        return redirect()->route('admin.arretes.index')->with('success', 'Arrêté mis à jour avec succès.');
    }

    public function destroy(Arrete $arrete)
    {
        // Supprimer le fichier s'il existe
        if ($arrete->file_path) {
            Storage::disk('public')->delete($arrete->file_path);
        }

        $arrete->delete();

        return redirect()->route('admin.arretes.index')->with('success', 'Arrêt supprimé avec succès!');
    }

    public function arretesByCategory($categoryId)
{
    $category = Category::findOrFail($categoryId);
    $arretes = Arrete::where('category_id', $categoryId)->get();
    return view('arretes.index', compact('arretes', 'category'));
}

public function view($id)
{
    $arrete = Arrete::findOrFail($id);
    return view('arretes.view', compact('arrete'));
}
    
}