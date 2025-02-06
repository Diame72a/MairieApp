@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-6 sm:p-8">
        <h1 class="text-3xl font-bold mb-6 text-purple-600 bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
            Créer un utilisateur
        </h1>
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Champ Nom -->
            <div>
                <label for="name" class="block text-purple-900 font-medium">Nom</label>
                <input 
                    type="text" 
                    class="mt-2 block w-full px-4 py-3 bg-purple-50 text-purple-900 rounded-lg focus:ring focus:ring-purple-400 focus:ring-opacity-50" 
                    id="name" 
                    name="name" 
                    placeholder="Entrez le nom" 
                    required>
            </div>

            <!-- Champ Email -->
            <div>
                <label for="email" class="block text-purple-900 font-medium">Email</label>
                <input 
                    type="email" 
                    class="mt-2 block w-full px-4 py-3 bg-purple-50 text-purple-900 rounded-lg focus:ring focus:ring-purple-400 focus:ring-opacity-50" 
                    id="email" 
                    name="email" 
                    placeholder="Entrez l'adresse email" 
                    required>
            </div>

            <!-- Champ Mot de Passe -->
            <div>
                <label for="password" class="block text-purple-900 font-medium">Mot de passe</label>
                <input 
                    type="password" 
                    class="mt-2 block w-full px-4 py-3 bg-purple-50 text-purple-900 rounded-lg focus:ring focus:ring-purple-400 focus:ring-opacity-50" 
                    id="password" 
                    name="password" 
                    placeholder="Entrez le mot de passe" 
                    required>
            </div>

            <!-- Confirmation Mot de Passe -->
            <div>
                <label for="password_confirmation" class="block text-purple-900 font-medium">Confirmez le mot de passe</label>
                <input 
                    type="password" 
                    class="mt-2 block w-full px-4 py-3 bg-purple-50 text-purple-900 rounded-lg focus:ring focus:ring-purple-400 focus:ring-opacity-50" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Confirmez le mot de passe" 
                    required>
            </div>

            <!-- Bouton de Soumission -->
            <div>
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
