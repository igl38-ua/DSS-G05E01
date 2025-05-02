{{-- resources/views/contacto/pregunta.blade.php --}}
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8 contact-card">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">¿No encontraste tu respuesta?</h3>
            <form method="POST" action="{{ route('contacto.pregunta') }}">
                @csrf
                <div class="mb-6">
                    <label for="faqEmail" class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                    <input type="email" id="faqEmail" name="faqEmail" value="{{ old('faqEmail') }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none"
                        placeholder="tu@email.com" required>
                    @error('faqEmail')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="faqQuestion" class="block text-gray-700 font-medium mb-2">Tu pregunta</label>
                    <textarea id="faqQuestion" name="faqQuestion" rows="4"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none"
                        placeholder="Escribe tu pregunta aquí..." required>{{ old('faqQuestion') }}</textarea>
                    @error('faqQuestion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Enviar pregunta
                </button>
            </form>

            @if(session('faq_success'))
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('faq_success') }}
                </div>
            @endif
        </div>
    </div>
</section>
