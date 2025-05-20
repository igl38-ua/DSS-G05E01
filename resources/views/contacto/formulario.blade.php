<div class="bg-white rounded-xl shadow-lg p-8 contact-card">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Envía un mensaje</h3>
    <form method="POST" action="{{ route('contacto.enviar') }}">
        @csrf
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Nombre completo</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none" required>
            @error('nombre') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none" required>
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Teléfono (opcional)</label>
            <input type="tel" name="telefono" value="{{ old('telefono') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Asunto</label>
            <select name="asunto" class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none" required>
                <option value="">Selecciona un tema</option>
                <option value="membership" {{ old('asunto') == 'membership' ? 'selected' : '' }}>Membresías</option>
                <option value="classes" {{ old('asunto') == 'classes' ? 'selected' : '' }}>Clases</option>
                <option value="trainers" {{ old('asunto') == 'trainers' ? 'selected' : '' }}>Entrenadores</option>
                <option value="other" {{ old('asunto') == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('asunto') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Mensaje</label>
            <textarea name="mensaje" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 input-focus focus:outline-none" required>{{ old('mensaje') }}</textarea>
            @error('mensaje') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-700 text-white py-3 px-4 rounded-lg transition duration-300">
            Enviar mensaje
        </button>
    </form>
</div>
