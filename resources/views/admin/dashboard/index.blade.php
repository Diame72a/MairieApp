@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6">Tableau de bord Admin</h1>

    <!-- Tableau des statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        <!-- Total des Arrêtés -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="text-gray-500 text-sm font-medium">Total Arrêtés</div>
            </div>
            <div class="text-2xl font-semibold text-gray-900">{{ $totalArretes }}</div>
        </div>

        <!-- Total des Catégories -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="text-gray-500 text-sm font-medium">Total Catégories</div>
            </div>
            <div class="text-2xl font-semibold text-gray-900">{{ $categories->count() }}</div>
        </div>
        
        <!-- Arrêtés par Catégorie -->
        @foreach($arretesByCategory as $category)
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="text-gray-500 text-sm font-medium">Arrêtés - {{ $category->name }}</div>
            </div>
            <div class="text-2xl font-semibold text-gray-900">{{ $category->arretes_count }}</div>
        </div>
        @endforeach

        <!-- Total des Utilisateurs -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="text-gray-500 text-sm font-medium">Total Utilisateurs</div>
            </div>
            <div class="text-2xl font-semibold text-gray-900">{{ $totalUsers }}</div>
        </div>
    </div>

    <!-- Liste des Derniers Utilisateurs -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mt-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Derniers Utilisateurs</h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Nom</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Date d'Inscription</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentUsers as $user)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection