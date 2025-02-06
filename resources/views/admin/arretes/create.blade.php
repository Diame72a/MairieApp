@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Créer un nouvel Arrêt</h1>

        <form action="{{ route('admin.arretes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Titre</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 border p-3 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" class="w-full border-gray-300 border p-3 rounded-md" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="file" class="block text-gray-700">Fichier</label>
                <input type="file" name="file" id="file" class="w-full border-gray-300 border p-3 rounded-md">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Créer</button>
        </form>
    </div>
@endsection
