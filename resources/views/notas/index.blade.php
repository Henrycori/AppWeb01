<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes and Reminders</title>
    
    {{-- Tailwind CSS CDN para estilos rápidos y modernos --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    {{-- Flatpickr CSS para el selector de fecha y hora --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Notes and Reminders</h1>

        
        {{-- Formulario para Crear Nota con campos vacíos --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Formulario para Crear Nota</h2>
            <form action="{{ route('notas.store') }}" method="POST"> 
                @csrf 

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    {{-- Seleccionar Usuario (Mantengo el ejemplo de Alice, pero en un entorno real debe ser dinámico o el usuario autenticado) --}}
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Usuario</label>
                        <div class="relative">
                            {{-- El valor por defecto de 'select' se establece por el atributo 'selected' en la opción --}}
                            <select id="user_id" name="user_id" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                                <option value="" disabled selected>Selecciona un usuario</option>
                                {{-- Aquí se cargarían dinámicamente los usuarios: --}}
                                {{-- @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach --}}
                                <option value="1">Alice Smith</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Título Nota (VACÍO) --}}
                    <div class="mb-4">
                        <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título Nota</label>
                        <input type="text" id="titulo" name="titulo" value="" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" placeholder="Título de la nota">
                    </div>
                </div>

                {{-- Contenido (VACÍO) --}}
                <div class="mb-4">
                    <label for="contenido" class="block text-gray-700 text-sm font-bold mb-2">Contenido</label>
                    <textarea id="contenido" name="contenido" rows="4" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" placeholder="Escribe el contenido de tu nota aquí..."></textarea>
                </div>

                {{-- Fecha Vencimiento (VACÍO) --}}
                <div class="mb-6 flex items-center">
                    <label for="fecha_vencimiento" class="block text-gray-700 text-sm font-bold mr-4 w-40 flex-shrink-0">Fecha Vencimiento</label>
                    <div class="relative flex-grow">
                        <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" value="" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 flatpickr-input" placeholder="mm/dd/yyyy --:--">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                </div>

                
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Añadir Nota
                    </button>
                </div>
            </form>
        </div>

        ---
        
        {{-- Sección de Notas Existentes (Con la lógica de los datos estáticos de los ejemplos anteriores) --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Usuario: Alice Smith</h2>
                <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">3 Active Notes</span> 
            </div>

            {{-- Aquí irían las notas dinámicas o los ejemplos estáticos --}}
            <p class="text-gray-500 italic">Aquí se mostrarían las notas existentes.</p>
        </div>
    </div>

    
    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#fecha_vencimiento", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altInput: true,
                altFormat: "m/d/Y H:i",
            });
        });
    </script>
</body>
</html>