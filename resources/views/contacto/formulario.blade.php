<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - ¡Pow! Cómics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="relative z-10 bg-black p-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-shadow">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
            
            <div class="flex items-center space-x-6">
                <a href="{{ route('tiendaCliente') }}" class="text-white hover:text-yellow-400">Cómics</a>
                <a href="{{ route('misPedidos') }}" class="text-white hover:text-yellow-400">Mis Pedidos</a>
                <a href="{{ route(name: 'misCompras') }}" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="{{ route('membresia') }}" class="text-yellow-400">Mi Membresía</a>
                <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>
                
                <div class="relative">
                    <input type="text" placeholder="Buscar..." class="px-4 py-2 rounded text-black">
                    <button class="absolute right-2 top-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path d="M23 21l-6-6m2-6a9 9 0 1 0-9 9 9 9 0 0 0 9-9z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>


    <!-- Formulario -->
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white text-black p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6 text-center">Contáctanos</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-4 mb-4 rounded text-sm">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contacto.enviar') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required class="w-full p-2 border border-gray-300 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-2 border border-gray-300 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Mensaje</label>
                    <textarea name="mensaje" rows="4" required class="w-full p-2 border border-gray-300 rounded">{{ old('mensaje') }}</textarea>
                </div>

                <button type="submit" class="bg-yellow-500 text-black font-semibold px-4 py-2 rounded hover:bg-yellow-400 w-full">
                    Enviar mensaje
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
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