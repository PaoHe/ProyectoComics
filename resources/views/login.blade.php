<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Inicia Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <nav class="bg-black p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
        <div>
            <a href="{{ route(name: 'register') }}" class="bg-black border border-white px-4 py-2 rounded ml-2">Regístrate</a>
            <a href="{{ route('loginAdmin') }}"><button class="bg-gray-300 text-black px-4 py-2 rounded">Administrador</button></a>        
        </div>
    </nav>
    
    <div class="relative flex justify-center items-center h-screen" 
         style="background-image: url('{{ asset('Fondo 1.png') }}'); 
                background-size: auto;
                background-repeat: repeat;
                background-position: center;">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        
        <div class="relative text-center">
            <h1 class="text-4xl font-bold text-shadow">Bienvenido</h1>
            <p class="text-lg text-shadow">Inicia Sesión</p>

            <div id="errorMessage" class="hidden bg-red-500 text-white p-4 rounded-lg shadow-lg mt-4 w-80 mx-auto">
                Usuario o contraseña incorrectos.
            </div>

            <div class="bg-white text-black p-6 rounded-lg shadow-lg mt-4 w-80">
                <form id="loginForm">
                    <label class="block text-left">Usuario</label>
                    <input type="text" id="username" class="w-full p-2 border rounded mb-3" placeholder="Usuario" required>

                    <label class="block text-left">Correo</label>
                    <input type="email" id="email" class="w-full p-2 border rounded mb-3" placeholder="email@ejemplo.com" required>

                    <label class="block text-left">Contraseña</label>
                    <input type="password" id="password" class="w-full p-2 border rounded mb-3" placeholder="*****" required>

                    <a href="{{ route('register') }}" class="text-blue-500 text-sm block">¿No tienes cuenta?</a>
                    <button type="submit" class="w-full bg-black text-white p-2 rounded mt-4">¡Vamos!</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-black p-6 text-center">
        <div class="flex justify-center space-x-4">
            <a href="#" class="text-white">X</a>
            <a href="#" class="text-white">Instagram</a>
            <a href="#" class="text-white">YouTube</a>
        </div>
        <div class="mt-4">
            <h2 class="font-bold">Preventas Exclusivas</h2>
            <ul class="text-gray-400 text-sm">
                <li>DC Comics</li>
                <li>Marvel Comics</li>
                <li>Panini Comics</li>
                <li>Catálogos</li>
                <li>Artículos Exclusivos</li>
            </ul>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = document.getElementById("errorMessage");

            document.getElementById("loginForm").addEventListener("submit", async function (event) {
                event.preventDefault(); 

                const name = document.getElementById("username").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;

                try {
                    const response = await fetch("http://127.0.0.1:8001/login", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ name, email, password })
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(data.detail || "Credenciales incorrectas");
                    }

                    localStorage.setItem("token", data.token);
                    window.location.href = "/tiendaCliente";

                } catch (error) {
                    errorMessage.textContent = error.message;
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
