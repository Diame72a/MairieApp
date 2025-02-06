@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6">Liste des Catégories</h1>

    <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 inline-block">Ajouter une catégorie</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-4 mb-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300">Emoji</th>
                <th class="px-4 py-2 border border-gray-300">Nom</th>
                <th class="px-4 py-2 border border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{ $category->emoji }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $category->name }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700">Modifier</a> |
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
