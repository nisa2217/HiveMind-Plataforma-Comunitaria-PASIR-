<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido a ') }}<span class="text-indigo-600">CyberBlog</span>
        </h2>
    

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Sección de Bienvenida -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-8 bg-gradient-to-r from-indigo-50 to-blue-50">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">✨ Explora el mundo digital con nosotros</h3>
                    <p class="text-gray-600 mb-4">
                        CyberBlog es tu espacio para descubrir artículos sobre tecnología, seguridad informática y tendencias digitales. 
                        Comparte tus conocimientos y conecta con una comunidad apasionada.
                    </p>
                    <p class="text-gray-600">
                        Únete a nosotros y mantente al día con las últimas noticias y consejos en el mundo de la ciberseguridad.
                    </p>
                </div>
            </div>

            <!-- Normas de la Comunidad -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">📜 Normas de la Comunidad</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-indigo-600">•</div>
                            <p class="ml-2 text-gray-600">Respeto ante todo. No toleramos discriminación o ataques personales.</p>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-indigo-600">•</div>
                            <p class="ml-2 text-gray-600">Comparte conocimiento, no spam. Los enlaces promocionales deben ser aprobados.</p>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-indigo-600">•</div>
                            <p class="ml-2 text-gray-600">Verifica fuentes antes de publicar información técnica.</p>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-indigo-600">•</div>
                            <p class="ml-2 text-gray-600">Usa categorías correctamente para mantener el orden.</p>
                        </div>
                    </div>

                    <div class="mt-6 bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Al usar CyberBlog, aceptas nuestras <a href="#" class="font-medium underline">Políticas de Privacidad</a> y <a href="#" class="font-medium underline">Términos de Uso</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>