<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
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
    <div class="container mx-auto p-4">
        <div class="relative bg-gray-400 rounded-lg p-8 mb-8">
            <div class="absolute inset-0 overflow-hidden" style="background-image: url('/api/placeholder/1200/300'); background-size: cover; opacity: 0.3;"></div>
            <div class="absolute top-0 left-0 w-full h-full" id="burstsContainer"></div>
            <div class="flex justify-between items-center relative z-10">
                <h1 class="text-4xl font-bold text-white">Mis Productos</h1>
                <a id="addProductButton" class="bg-black text-white px-4 py-2 rounded" href="{{ route('productosRegistro') }}">
                    Agregar Producto
                </a>
            </div>
        </div>

        <div class="space-y-6 pb-16">
        @if ($productos->count() > 0)
            <!-- Fragmento dentro del foreach de productos -->
            @foreach($productos as $producto)
        <div class="bg-white rounded-lg shadow-md overflow-hidden flex items-center p-4 
            {{ $producto->stock_actual < 3 ? 'border-2 border-red-500' : '' }}">
          <img src="{{ asset('storage/' . $producto->imagen_url) }}" alt="{{ $producto->nombre }}"
              class="w-28 h-40 object-cover rounded border border-gray-300">
          <div class="ml-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ $producto->nombre }}</h2>
            <p class="text-gray-600 mt-1">${{ number_format($producto->precio, 2) }} MXN</p>
            
            <p class="text-sm mt-2 text-gray-700">Descripción: {{ $producto->descripcion ?? 'Sin descripción.' }}</p>
            <p class="text-sm mt-1 text-gray-500">SKU: {{ $producto->sku ?? 'N/A' }}</p>
            <p class="text-sm mt-1 text-gray-500">Editorial/Marca: {{ $producto->editorial_o_marca ?? 'N/A' }}</p>
            <p class="text-sm mt-1 text-gray-500">Fecha lanzamiento: {{ $producto->fecha_lanzamiento ?? 'N/A' }}</p>

            <p class="mt-3 text-sm text-gray-500">
                Stock disponible: 
                <span class="font-bold
                    @if($producto->stock_actual < 3)
                        text-red-500
                    @elseif($producto->stock_actual <= 5)
                        text-yellow-500
                    @else
                        text-green-600
                    @endif
                ">
                    {{ $producto->stock_actual }} unidades
                </span>
            </p>

            <div class="flex space-x-2 mt-4">
              <a href="{{ route('productos.edit', $producto->id_producto) }}" 
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Editar
              </a>

              <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST"
                    onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                  Eliminar
                </button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        @else
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <p class="text-gray-500">No hay productos registrados.</p>
            </div>
        @endif

        </div>
        <!-- Paginación -->
        <div class="mt-8 flex justify-center">
            {{ $productos->links('pagination::tailwind') }}
        </div>

        
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error al guardar',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Revisar'
    });
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($productos->where('stock_actual', '<', 5)->count() > 0)
  <script>
    Swal.fire({
      icon: 'warning',
      title: '¡Atención!',
      text: 'Algunos productos tienen stock bajo. Considera reabastecer.',
      confirmButtonColor: '#d33',
      confirmButtonText: 'Entendido'
    });
  </script>
@endif
</body>
</html>