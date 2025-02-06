@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6">Modifier la Catégorie</h1>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="emoji" class="block text-gray-700">Emoji</label>
            <input type="text" name="emoji" id="emoji" value="{{ $category->emoji }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Mettre à jour la catégorie</button>
    </form>
</div>
@endsection
