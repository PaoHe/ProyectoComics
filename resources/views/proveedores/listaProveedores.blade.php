<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proveedores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-black text-white p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
        <div class="space-x-6">
            <a href="{{ route('todosProductos') }}" class="hover:text-yellow-400">Productos</a>
            <a href="{{ route('productosRegistro') }}" class="hover:text-yellow-400">Registro de Producto</a>
            <a href="{{ route('proveedores.index') }}" class="hover:text-yellow-400">Proveedores</a>
            <a href="{{ route('perfilAdmin') }}" class="hover:text-yellow-400">Mi perfil</a>
        </div>
    </nav>

    <main class="flex-grow">

    <!-- Contenido -->
    <div class="container mx-auto mt-10 mb-20">
        <h1 class="text-3xl font-bold mb-6">Lista de Proveedores</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('proveedores.create') }}" 
            class="bg-yellow-500 text-black font-semibold px-4 py-2 rounded hover:bg-yellow-400 shadow">
                + Nuevo Proveedor
            </a>
        </div>


        <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Contacto</th>
                    <th class="px-4 py-2">Teléfono</th>
                    <th class="px-4 py-2">Dirección</th>
                    <th class="px-4 py-2">Último Abastecimiento</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
              @foreach($proveedores as $proveedor)
              <tr class="border-b">
                  <td class="px-4 py-2">{{ $proveedor->nombre }}</td>
                  <td class="px-4 py-2">{{ $proveedor->email }}</td>
                  <td class="px-4 py-2">{{ $proveedor->contacto }}</td>
                  <td class="px-4 py-2">{{ $proveedor->telefono }}</td>
                  <td class="px-4 py-2">{{ $proveedor->direccion }}</td>
                  <td class="px-4 py-2">
                      {{ \Carbon\Carbon::parse($proveedor->fecha_ultimo_abastecimiento)->format('d/m/Y') }}
                  </td>
                  <td class="px-4 py-2 flex space-x-2">
                      <a href="{{ route('proveedores.editar', $proveedor->id) }}"
                        class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                      <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este proveedor?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Eliminar</button>
                      </form>
                  </td>
              </tr>
              @endforeach
              </tbody>

                
        </table>
    </div>
    </main>

    <footer class="bg-white py-4 border-t">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex space-x-4 mb-4 md:mb-0">
          <a href="#" class="text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
              <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
            </svg>
          </a>
          <a href="#" class="text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a href="#" class="text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube">
              <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
              <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
            </svg>
          </a>
        </div>
        <nav class="grid grid-cols-2 gap-4 text-sm text-gray-600">
          <a href="#" class="hover:text-black">Preventas Exclusivas</a>
          <a href="#" class="hover:text-black">DC Comics</a>
          <a href="#" class="hover:text-black">Marvel Comics</a>
          <a href="#" class="hover:text-black">Panini Comics</a>
          <a href="#" class="hover:text-black">Catálogos</a>
          <a href="#" class="hover:text-black">Artículos Exclusivos</a>
        </nav>
      </div>
    </div>
  </footer>
</body>
</html>