@extends('layouts.default')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Catégories d'Arrêtés</h1>

        @php
            $colors = [
                'from-blue-500 to-blue-600',
                'from-green-500 to-green-600',
                'from-yellow-500 to-yellow-600',
                'from-red-500 to-red-600',
                'from-purple-500 to-purple-600',
                'from-pink-500 to-pink-600',
                'from-indigo-500 to-indigo-600',
                'from-teal-500 to-teal-600',
                'from-orange-500 to-orange-600',
                'from-gray-500 to-gray-600',
                // Ajoutez autant de couleurs que nécessaire
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $index => $category)
                <div class="flex justify-center">
                    <a href="{{ route('categories.show', $category->id) }}" class="w-full max-w-xs mx-auto bg-gradient-to-r {{ $colors[$index % count($colors)] }} text-white text-center py-6 px-4 rounded-lg shadow-lg hover:scale-105 transition-transform duration-200">
                        <div class="text-4xl mb-4">
                            {{ $category->emoji }}
                        </div>
                        <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
