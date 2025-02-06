<!-- resources/views/components/navigation.blade.php -->
<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <!-- Logo ou titre -->
            <a href="{{ url('/') }}" class="text-white text-lg font-semibold">Mon Application</a>
        </div>
        <div class="flex items-center space-x-4">
            <!-- Lien vers le CRUD des utilisateurs -->
            <a href="{{ route('users.index') }}" class="text-white">Utilisateurs</a>
        </div>
    </div>
</nav>
