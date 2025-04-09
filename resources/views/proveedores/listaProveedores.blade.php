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
                      <a href="{{ route('proveedores.editar', $proveedor->id_proveedor) }}"
                        class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                      <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}" method="POST"
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
                <!-- Twitter -->
              </a>
              <a href="#" class="text-gray-600 hover:text-black">
                <!-- Instagram -->
              </a>
              <a href="#" class="text-gray-600 hover:text-black">
                <!-- YouTube -->
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
