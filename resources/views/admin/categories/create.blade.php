@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6">Ajouter une Catégorie</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="emoji" class="block text-gray-700">Emoji</label>
            <input type="text" name="emoji" id="emoji" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>
</div>
@endsection
