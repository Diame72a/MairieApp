@extends('layouts.default')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Arrêtés de la catégorie : {{ $category->name }}</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($arretes as $arrete)
            <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200">
                <h2 class="text-xl font-semibold mb-2">{{ $arrete->title }}</h2>
                <a href="{{ route('arretes.view', $arrete->id) }}" 
                   class="block text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Voir l'arrêté
                </a>
            </div>
        @endforeach
    </div>
    
    <div class="mt-6 text-center">
        <a href="{{ route('categories.index') }}" 
           class="inline-block bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            Retour
        </a>
    </div>
</div>
@endsection