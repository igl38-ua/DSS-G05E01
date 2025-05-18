{{-- resources/views/partials/footer.blade.php --}}
<footer class="bg-gray-900 text-white py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:justify-between space-y-8 md:space-y-0">

            <!-- Columna 1 -->
            <div>
                <h5 class="font-bold mb-2">¿Necesitas ayuda?</h5>
                <p class="text-sm text-gray-400 mb-4">Contacta con nosotros para resolver tus dudas.</p>
                <a href="{{ route('contacto') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-colors text-sm font-semibold"
                >
                    Contáctanos
                </a>
            </div>

            <!-- Columna 2 -->
            <div>
                <h5 class="font-bold mb-2">Ayuda al cliente</h5>
                <ul class="space-y-1 text-sm text-gray-400">
                    <li><a href="{{ route('suscripciones') }}" class="hover:text-gray-200 transition-colors">Pagos</a></li>
                    <li><a href="{{ route('terminos') }}" class="hover:text-gray-200 transition-colors">Términos y condiciones</a></li>
                    <li><a href="{{ route('privacidad') }}" class="hover:text-gray-200 transition-colors">Política de privacidad</a></li>
                </ul>
            </div>

            <!-- Columna 3 -->
            <div>
                <h5 class="font-bold mb-2">Gimnasio</h5>
                <ul class="space-y-1 text-sm text-gray-400">
                    <li><a href="{{ route('playlists.show', ['playlistId' => 'PLz-l7oWFJS0JpFK3d3qSGbMSpcKjZgQI6']) }}" class="hover:text-gray-200 transition-colors">Rutinas</a></li>
                    <li><a href="https://es.venum.com/" class="hover:text-gray-200 transition-colors"  target="_blank">Marcas</a></li>
                    <li><a href="https://www.prozis.com/es/es" class="hover:text-gray-200 transition-colors"  target="_blank">Inversores</a></li>
                </ul>
            </div>

            <!-- Columna 4 -->
            <div>
                <h5 class="font-bold mb-2">Recursos</h5>
                <ul class="space-y-1 text-sm text-gray-400">
                    <li><a href="{{ route('foro.index') }}" class="hover:text-gray-200 transition-colors">¿Qué hay de nuevo?</a></li>
                    <li><a href="https://fitgeneration.es/blog/" class="hover:text-gray-200 transition-colors" target="_blank">Blogs</a></li>
                    <li><a href="{{ route('ayuda') }}" class="hover:text-gray-200 transition-colors">Centro de ayuda</a></li>
                </ul>
            </div>

            <!-- Icono flotante o columna adicional -->
            <div class="flex flex-col items-center space-y-6">
                <!-- Globo de ayuda (simulando un icono) -->
                <div class="relative bg-indigo-600 rounded-full w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10c0 4.418 3.58 8 8 8 1.188 0 2.318-.262 3.336-.732L17 18l-.732-3.664A7.96 7.96 0 0 0 18 10c0-4.42-3.58-8-8-8S2 5.58 2 10zm7-1h2v2H9v-2zm0-4h2v3H9V5z"/>
                    </svg>
                </div>

                <!-- Redes sociales -->
                <div class="flex space-x-4 text-gray-400">
                    <a href="https://www.facebook.com/SmartFit.Oficial?locale=es_ES%2F" class="hover:text-gray-200 transition-colors" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/smartfit_es/" class="hover:text-gray-200 transition-colors" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://x.com/Smart_CityLATAM" class="hover:text-gray-200 transition-colors" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.youtube.com/@smartfit" class="hover:text-gray-200 transition-colors" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>
