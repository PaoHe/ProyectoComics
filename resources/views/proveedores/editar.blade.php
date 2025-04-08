<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor</title>
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

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Editar Proveedor</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ $proveedor->email }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Teléfono</label>
            <input type="text" name="telefono" value="{{ $proveedor->telefono }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Contacto</label>
            <input type="text" name="contacto" value="{{ $proveedor->contacto }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Dirección</label>
            <input type="text" name="direccion" value="{{ $proveedor->direccion }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Fecha del último abastecimiento</label>
            <input type="date" name="fecha_ultimo_abastecimiento" value="{{ \Carbon\Carbon::parse($proveedor->fecha_ultimo_abastecimiento)->format('Y-m-d') }}" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-yellow-500 text-black px-6 py-2 rounded hover:bg-yellow-400 font-bold">
            Guardar Cambios
        </button>
    </form>
</div>

<!-- Footer -->
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