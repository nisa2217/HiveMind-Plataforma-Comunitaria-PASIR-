@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden">
            <div class="p-8">
                <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Nuevo Artículo</h1>

                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título del artículo</label>
                        <input type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ej: Ola de ciberataques a bancos">
                    </div>

                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Contenido</label>
                        <textarea name="description" id="description" rows="12" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Escribe aquí el contenido completo del artículo..."></textarea>
                    </div>

                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-medium text-gray-700">Imagen destacada</label>
                        <div class="mt-1 flex items-center">
                            <label for="image" class="cursor-pointer">
                                <span class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Seleccionar imagen
                                </span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                            </label>
                            <span class="ml-3 text-sm text-gray-500" id="file-name">Ningún archivo seleccionado</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Formatos: JPEG, PNG, JPG, GIF, SVG (Max. 2MB)</p>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Publicar Artículo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Mostrar nombre del archivo seleccionado
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Ningún archivo seleccionado';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
@endsection