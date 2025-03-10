<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Iniciar Sesión Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

    <nav class="bg-black p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
        <div>
        <a href="{{ route('login') }}"><button class="bg-black border border-white px-4 py-2 rounded ml-2">Iniciar Sesión</button></a>
        <a href="{{ route('register') }}"><button class="bg-gray-300 text-black px-4 py-2 rounded">Registrarte</button></a>
        </div>
    </nav>
    
    <div class="relative flex justify-center items-center flex-grow" 
         style="background-image: url('{{ asset('Fondo 1.png') }}'); 
                background-size: auto;
                background-repeat: repeat;
                background-position: center;">

        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        
        <div class="relative text-center z-10">
            <h1 class="text-4xl font-bold text-shadow">Bienvenido Administrador</h1>
            <p class="text-lg text-shadow">Inicia Sesión</p>

            <div id="errorMessage" class="hidden bg-red-500 text-white p-4 rounded-lg shadow-lg mt-4 w-80 mx-auto">
                Usuario o contraseña incorrectos.
            </div>

            <div class="bg-white text-black p-6 rounded-lg shadow-lg mt-4 w-80 mx-auto">
                <form id="loginForm">
                    <label class="block text-left">Usuario</label>
                    <input type="text" id="username" class="w-full p-2 border rounded mb-3" placeholder="Usuario" required>
                    <label class="block text-left">Contraseña</label>
                    <input type="password" id="password" class="w-full p-2 border rounded mb-3" placeholder="*****" required>
                    <a href="#" class="text-blue-500 text-sm block">¿Olvidaste tu contraseña?</a>
                    <a href="{{ route('todosProductos') }}" class="w-full bg-black text-white p-2 rounded mt-4 text-center block">¡Iniciar Sesión!</a>                </form>
            </div>
        </div>
    </div>

    <footer class="bg-black text-white py-6">
        <div class="text-center">
            <h3 class="font-bold text-lg">Preventas Exclusivas</h3>
            <p>DC Comics</p>
            <p>Marvel Comics</p>
            <p>Panini Comics</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = document.getElementById("errorMessage");

            document.getElementById("loginForm").addEventListener("submit", function (event) {
                event.preventDefault(); 

                const staticUser = "Admin"; 
                const staticPassword = "12345";

                const username = document.getElementById("username").value;
                const password = document.getElementById("password").value;

                if (username === staticUser && password === staticPassword) {
                    window.location.href = "{{ route('loginAdmin') }}"; 
                } else {
                    errorMessage.classList.remove("hidden");
                    setTimeout(() => {
                        errorMessage.classList.add("hidden");
                    }, 3000); 
                }
            });
        });
    </script>
</body>
</html>