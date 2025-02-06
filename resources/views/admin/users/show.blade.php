@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-6 sm:p-8">
        <h1 class="text-3xl font-bold mb-6 text-purple-600 bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
            Détails de l'utilisateur
        </h1>
        <div class="mb-6">
            <label class="block text-purple-900 font-medium">Nom</label>
            <p class="mt-2 block w-full px-4 py-3 bg-purple-50 text-purple-900 rounded-lg">{{ $user->name }}</p>
        </div>
        <div class="mb-6">
            <label class="block text-purple-900 font-medium">Email</label>
            <p class="mt-2 block w-full px-4 py-3 bg-purple-50 text-purple-900 rounded-lg">{{ $user->email }}</p>
        </div>
        <div>
            <a href="{{ route('users.index') }}" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection
