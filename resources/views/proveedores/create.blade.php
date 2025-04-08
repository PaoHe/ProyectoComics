<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Proveedor</title>
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

  <main class="flex-grow container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Registrar Nuevo Proveedor</h1>

    @if($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('proveedores.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl mx-auto">
      @csrf

      <div class="mb-4">
        <label class="block font-semibold">Nombre de la empresa</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border border-gray-300 p-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Correo</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 p-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Nombre del contacto</label>
        <input type="text" name="contacto" value="{{ old('contacto') }}" class="w-full border border-gray-300 p-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}" class="w-full border border-gray-300 p-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Dirección</label>
        <input type="text" name="direccion" value="{{ old('direccion') }}" class="w-full border border-gray-300 p-2 rounded">
      </div>

      <div class="mb-6">
        <label class="block font-semibold">Fecha del último abastecimiento</label>
        <input type="date" name="fecha_ultimo_abastecimiento" value="{{ old('fecha_ultimo_abastecimiento') }}" class="w-full border border-gray-300 p-2 rounded">
      </div>

      <button type="submit" class="w-full bg-yellow-500 text-black font-semibold py-2 rounded hover:bg-yellow-400">
        Guardar Proveedor
      </button>
    </form>
  </main>

  <footer class="bg-white py-4 border-t mt-10">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
      <div class="flex space-x-4 mb-4 md:mb-0">
        <a href="#" class="text-gray-600 hover:text-black">Twitter</a>
        <a href="#" class="text-gray-600 hover:text-black">Instagram</a>
        <a href="#" class="text-gray-600 hover:text-black">YouTube</a>
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
  </footer>
</body>
</html>