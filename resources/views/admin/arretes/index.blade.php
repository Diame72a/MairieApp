@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Liste des Arrêts</h1>
        
        <a href="{{ route('admin.arretes.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Créer un nouvel arrêt</a>
        
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-gray-700">Titre</th>
                    <th class="px-6 py-3 text-left text-gray-700">Catégorie</th>
                    <th class="px-6 py-3 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arretes as $arrete)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $arrete->title }}</td>
                        <td class="px-6 py-4">{{ $arrete->category->name }}</td>
                        <td class="px-6 py-4 flex space-x-4">
                            <a href="{{ route('admin.arretes.show', $arrete->id) }}" class="text-blue-500 hover:text-blue-700">Voir</a>
                            <a href="{{ route('admin.arretes.edit', $arrete->id) }}" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                            <form action="{{ route('admin.arretes.destroy', $arrete->id) }}" method="POST" class="inline-block">
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
