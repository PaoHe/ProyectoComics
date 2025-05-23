<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Regístrate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="bg-gray-900 text-white">
    <nav class="bg-black p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">¡<span class="text-yellow-400">Pow!</span> Cómics</div>
        <div>
            <a href="{{ route('loginAdmin') }}">
                <button class="bg-gray-300 text-black px-4 py-2 rounded">Administrador</button>
            </a>        
            <button onclick="window.location.href='{{ route('login') }}'" class="bg-black border border-white px-4 py-2 rounded ml-2">
                Inicia sesión
            </button>      
        </div>
    </nav>

    <main class="flex-grow flex justify-center items-center relative">
        <div class="absolute inset-0" 
            style="background-image: url('{{ asset('Fondo 1.png') }}'); 
            background-size: auto;
            background-repeat: repeat;
            background-position: center;">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>

        <div class="relative text-center z-10">
            <h1 class="text-4xl font-bold text-shadow">Bienvenido</h1>
            <p class="text-lg text-shadow">Regístrate</p>

            <div class="bg-white text-black p-6 rounded-lg shadow-lg mt-4 w-80">
                <form id="registerForm">
                    <label class="block text-left">Nombre</label>
                    <input type="text" id="nombre" class="w-full p-2 border rounded mb-3" placeholder="Nombre" required>

                    <label class="block text-left">Correo</label>
                    <input type="email" id="correo" class="w-full p-2 border rounded mb-3" placeholder="ejemplo@gmail.com" required>

                    <label class="block text-left">Contraseña</label>
                    <input type="password" id="contraseña" class="w-full p-2 border rounded mb-3" placeholder="******" required>

                    <input type="hidden" id="tipo_usuario" value="cliente">

                    <button type="submit" class="w-full bg-black text-white p-2 rounded mt-4">Registrarme</button>
                </form>
                <p class="text-red-500 text-center mt-2" id="errorMsg"></p>
                <p class="text-green-500 text-center mt-2" id="successMsg"></p>
            </div>
        </div>
    </main>

    <footer class="bg-black p-6 text-center mt-auto">
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
        document.getElementById("registerForm").addEventListener("submit", async function(event) {
            event.preventDefault();

            const nombre = document.getElementById("nombre").value;
            const correo = document.getElementById("correo").value;
            const contraseña = document.getElementById("contraseña").value;
            const tipo_usuario = document.getElementById("tipo_usuario").value;

            const userData = { nombre, correo, contraseña, tipo_usuario };

            try {
                const response = await fetch("http://127.0.0.1:8001/usuarios", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(userData)
                });

                const data = await response.json();

                if (response.status === 201) {
                    document.getElementById("successMsg").textContent = "¡Registro exitoso!";
                    document.getElementById("errorMsg").textContent = "";
                    document.getElementById("registerForm").reset();
                    // Sin redirección
                } else {
                    document.getElementById("errorMsg").textContent = data.message || "Error en el registro.";
                    document.getElementById("successMsg").textContent = "";
                }
            } catch (error) {
                document.getElementById("errorMsg").textContent = "Error de conexión con el servidor.";
                document.getElementById("successMsg").textContent = "";
            }
        });
    </script>
</body>
</html>
