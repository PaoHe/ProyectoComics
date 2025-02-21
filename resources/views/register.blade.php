<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Regístrate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <nav class="bg-black p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">¡<span class="text-yellow-400">Pow!</span> Cómics</div>
        <div>
            <button class="bg-gray-300 text-black px-4 py-2 rounded">Proveedores</button>
            <button class="bg-black border border-white px-4 py-2 rounded ml-2">Inicia sesión</button>
        </div>
    </nav>
    
    <div class="flex flex-col justify-center items-center h-screen bg-gray-700" style="background-image: url('https://via.placeholder.com/1200x800'); background-size: cover;">
        <h1 class="text-5xl font-bold text-white">Bienvenido</h1>
        <p class="text-lg text-gray-300">Regístrate</p>
        
        <div class="bg-white text-black p-6 rounded-lg shadow-lg mt-4 w-80">
            <form action="#" method="POST">
                <label class="block text-left">Nombre</label>
                <input type="text" class="w-full p-2 border rounded mb-3" placeholder="Nombre">
                <label class="block text-left">Apellido</label>
                <input type="text" class="w-full p-2 border rounded mb-3" placeholder="Apellido">
                <label class="block text-left">Contraseña</label>
                <input type="password" class="w-full p-2 border rounded mb-3" placeholder="******">
                <label class="block text-left">Confirmación de Contraseña</label>
                <input type="password" class="w-full p-2 border rounded mb-3" placeholder="******">
                <label class="block text-left">Correo</label>
                <input type="email" class="w-full p-2 border rounded mb-3" placeholder="ejemplo@gmail.com">
                <label class="block text-left">Confirmación de Correo</label>
                <input type="email" class="w-full p-2 border rounded mb-3" placeholder="ejemplo@gmail.com">
                <button type="submit" class="w-full bg-black text-white p-2 rounded mt-4">Registrarme</button>
            </form>
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
        <button class="bg-red-600 text-white px-4 py-2 rounded mt-4">¿Eres proveedor?</button>
    </footer>
</body>
</html>
