@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $arrete->title }}</h1>
        <p class="text-lg mb-2"><strong>Catégorie :</strong> {{ $arrete->category->name }}</p>
        <p class="text-lg mb-2"><strong>Fichier :</strong> <a href="{{ Storage::url($arrete->file_path) }}" class="text-blue-500 hover:text-blue-700">Télécharger</a></p>
        <a href="{{ route('admin.arretes.index') }}" class="text-blue-500 hover:text-blue-700">Retour à la liste</a>
    </div>
@endsection
