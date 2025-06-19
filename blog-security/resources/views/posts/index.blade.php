@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">NOTICIAS CIBERSEGURIDAD</h1>
            <p class="text-xl text-gray-600">Mantente informado sobre las últimas amenazas y protecciones</p>
        </div>

        @auth
        <div class="text-right mb-8">
            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuevo Artículo
            </a>
        </div>
        @endauth

        @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg transform hover:scale-105 transition duration-300">
                @if($post->image)
                <img class="w-full h-48 object-cover" src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}">
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h2>
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 150) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            Leer completo
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        @auth
                        <div class="flex space-x-2">
                             <a href="{{ route('posts.edit', $post) }}" class="text-gray-400 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este artículo?');">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No hay artículos aún</h3>
                <p class="mt-1 text-gray-500">Cuando publiques artículos, aparecerán aquí.</p>
                @auth
                <div class="mt-6">
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Crear primer artículo
                    </a>
                </div>
                @endauth
            </div>
            @endforelse
        </div>

        @if($posts->hasPages())
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</div>
@endsection