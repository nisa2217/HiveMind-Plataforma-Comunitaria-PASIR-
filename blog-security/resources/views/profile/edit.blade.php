@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Mi Perfil</h1>
        
        <!-- Información del usuario -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Información Básica</h2>
            <div class="space-y-4">
                <div>
                    <p class="text-gray-600">Nombre:</p>
                    <p class="font-medium">{{ $user->name }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Email:</p>
                    <p class="font-medium">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Miembro desde:</p>
                    <p class="font-medium">{{ $user->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Formulario de actualización -->
        <div class="border-t pt-6">
            <h2 class="text-xl font-semibold mb-4">Actualizar Información</h2>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 mb-2">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Guardar Cambios
                </button>
            </form>
        </div>
    </div>
</div>
@endsection