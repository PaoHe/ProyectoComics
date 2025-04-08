<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '¡Pow! Cómics')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- Header / Navbar -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-black">¡Pow! <span class="text-gray-600">Cómics</span></a>
            <nav class="space-x-4">
                <a href="{{ route('todosProductos') }}" class="text-gray-700 hover:text-black">Productos</a>
                <a href="{{ route('productosRegistro') }}" class="text-gray-700 hover:text-black">Registrar Producto</a>
                <a href="#" class="text-gray-700 hover:text-black">Mi Perfil</a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-600">
            <div class="mb-4 md:mb-0">
                © {{ date('Y') }} ¡Pow! Cómics. Todos los derechos reservados.
            </div>
            <div class="space-x-4">
                <a href="#" class="hover:text-black">Marvel</a>
                <a href="#" class="hover:text-black">DC</a>
                <a href="#" class="hover:text-black">Panini</a>
                <a href="#" class="hover:text-black">Catálogos</a>
            </div>
        </div>
    </footer>

</body>
</html>