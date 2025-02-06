@extends('layouts.default')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $arrete->title }}</h1>
        <p class="text-lg mb-2"><strong>Catégorie :</strong> {{ $arrete->category->name }}</p>
        <p class="text-lg mb-2"><strong>Fichier :</strong></p>

        <!-- Affichage du PDF -->
        <object data="{{ asset('storage/' . $arrete->file_path) }}" type="application/pdf" width="100%" height="600px">
            <p>Votre navigateur ne prend pas en charge les PDF intégrés. Vous pouvez <a href="{{ asset('storage/' . $arrete->file_path) }}">télécharger le PDF</a> pour le voir.</p>
        </object>

        <!-- Bouton retour -->
        <div class="mt-6">
            <a href="{{ route('categories.show', $arrete->category->id) }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                Retour à la catégorie
            </a>
        </div>
    </div>
@endsection


