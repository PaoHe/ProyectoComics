<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Membresía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .line-through-over {
            text-decoration: line-through;
            position: relative;
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            display: flex;
            align-items: center;
        }

        .price span {
            font-size: 2.5rem;
            font-weight: 900;
        }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <div class="relative flex flex-col flex-grow" 
         style="background-image: url('Fondo 1.png'); 
                background-size: auto;
                background-repeat: repeat;
                background-position: center;">
        
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <nav class="relative z-10 bg-black p-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-shadow">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
            
            <div class="flex items-center space-x-6">
                <a href="{{ route('tiendaCliente') }}" class="text-white hover:text-yellow-400">Cómics</a>
                <a href="#" class="text-white hover:text-yellow-400">Pedidos</a>
                <a href="#" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="{{ route('membresia') }}" class="text-yellow-400">Mi Membresía</a>
                <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>
            </div>
        </nav>

        <div class="relative z-10 flex flex-grow p-6">
            <main class="flex-grow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center">
                    <h1 class="font-bold text-lg">Básico</h1>
                    <p class="price">
                        <span>$0</span> / mes
                    </p>
                    <img src="{{ asset('imagenes/basico.jpeg') }}" alt="Plan Básico" class="w-42 h-52 mt-2">
                    <p>Acceso a vistas previas</p>
                    <p class="line-through-over">Sin anuncios</p>
                    <p class="line-through-over">Artículos exclusivos</p>
                    <p class="line-through-over">Precios exclusivos</p>
                    <p class="line-through-over">Envío gratuito</p>
                    <a href="#" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded">Tu plan</a>
                </div>

                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center">
                    <h1 class="font-bold text-lg">Fan</h1>
                    <p class="price">
                        <span>$99</span> / mes
                    </p>
                    <img src="{{ asset('imagenes/fan.jpg') }}" alt="Plan Básico" class="w-42 h-52 mt-2">
                    <p>Acceso a vistas previas</p>
                    <p>Sin anuncios</p>
                    <p>Artículos exclusivos</p>
                    <p class="line-through-over">Precios exclusivos</p>
                    <p class="line-through-over">Envío gratuito</p>
                    <a href="#" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded">Hazte fan</a>
                </div>

                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center">
                    <h1 class="font-bold text-lg">Estrella</h1>
                    <p class="price">
                        <span>$179</span> / mes
                    </p>
                    <img src="{{ asset('imagenes/estrella.jpg') }}" alt="Plan Básico" class="w-42 h-50 mt-2">
                    <p>Acceso a vistas previas</p>
                    <p>Sin anuncios</p>
                    <p>Artículos exclusivos</p>
                    <p>Precios exclusivos</p>
                    <p>Envío gratuito</p>
                    <a href="#" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded">Sé una estrella</a>
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-black text-white py-6 mt-auto">
        <div class="text-center">
            <h class="font-bold text-lg">Preventas Exclusivas</h>
            <p>DC Comics</p>
            <p>Marvel Comics</p>
            <p>Panini Comics</p>
        </div>
    </footer>
</body>
</html>
