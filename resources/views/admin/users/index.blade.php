@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    Gestion des Utilisateurs
                </h1>
                <a href="{{ route('users.create') }}" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    <i class="mr-2 h-4 w-4">+</i> Ajouter un utilisateur
                </a>
            </div>

            <div class="overflow-hidden rounded-xl border border-purple-100 shadow-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gradient-to-r from-purple-50 to-indigo-50">
                        <tr>
                            <th class="text-purple-900 font-semibold px-6 py-3">Nom</th>
                            <th class="text-purple-900 font-semibold px-6 py-3">Email</th>
                            <th class="text-purple-900 font-semibold text-center px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-purple-50/50 transition-colors duration-200">
                                <td class="font-medium text-purple-900 px-6 py-4">{{ $user->name }}</td>
                                <td class="text-purple-800 px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('users.show', $user->id) }}" class="inline-flex items-center bg-blue-50 border-2 border-blue-200 hover:bg-blue-100 text-blue-600 rounded-lg px-4 py-2 transition-all duration-300 hover:scale-105 shadow-sm hover:shadow-lg">
                                            <i class="h-5 w-5">👁</i>
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center bg-amber-50 border-2 border-amber-200 hover:bg-amber-100 text-amber-600 rounded-lg px-4 py-2 transition-all duration-300 hover:scale-105 shadow-sm hover:shadow-lg">
                                            <i class="h-5 w-5">✏️</i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center bg-red-50 border-2 border-red-200 hover:bg-red-100 text-red-600 rounded-lg px-4 py-2 transition-all duration-300 hover:scale-105 shadow-sm hover:shadow-lg">
                                                <i class="h-5 w-5">🗑️</i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
