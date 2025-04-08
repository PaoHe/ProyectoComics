<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
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
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Editar Producto</h1>
        <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
            <label class="block font-semibold">Precio</label>
            <input type="text" name="precio" value="{{ $producto->precio }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
            <label class="block font-semibold">Stock disponible</label>
            <input 
                type="number" 
                name="stock_actual" 
                value="{{ $producto->stock_actual }}" 
                class="w-full p-2 border border-gray-300 rounded"
                min="1" 
                max="100"
                required
                oninvalid="this.setCustomValidity('Ingresa una cantidad válida entre 1 y 100')" 
                oninput="this.setCustomValidity('')"
            >
        </div>

        <div>
            <label class="block font-semibold">Imagen</label>
            <input type="file" name="imagen" class="w-full">
            @if ($producto->imagen_url)
                <img src="{{ asset('storage/' . $producto->imagen_url) }}" class="mt-2 w-32 h-auto">
            @endif
        </div>

        <div>
            <label class="block font-semibold">Descripción</label>
            <input type="text" name="descripcion" value="{{ $producto->descripcion }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
            <label class="block font-semibold">SKU</label>
            <input type="text" name="sku" value="{{ $producto->sku }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
            <label class="block font-semibold">Fecha de lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" value="{{ $producto->fecha_lanzamiento }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
            <label class="block font-semibold">Editorial/Marca</label>
            <input type="text" name="editorial_o_marca" value="{{ $producto->editorial_o_marca }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
            <label class="block font-semibold">Proveedor</label>
            <select name="id_proveedor" class="w-full p-2 border border-gray-300 rounded">
                <option value="">Seleccionar proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}" {{ $producto->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-span-2 text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Guardar Cambios
            </button>
        </div>
    </div>
</form>

        
    </div>
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

</body>
</html>