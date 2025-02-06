@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white border-r border-gray-100 p-4">
        <div class="flex items-center justify-between mb-8">
            <h1 class="font-semibold text-xl">Admin</h1>
            <button class="p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <i class="w-5 h-5" aria-hidden="true"></i>
            </button>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('users.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                <i class="w-5 h-5" aria-hidden="true"></i>
                <span>Utilisateurs</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        @yield('users_content')
    </div>
</div>
@endsection
    