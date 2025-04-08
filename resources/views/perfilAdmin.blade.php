
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f5f5f5;
        }
        .profile-section {
            position: relative;
            padding: 40px 20px;
            background: #888;
            overflow: hidden;
        }
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }
        .profile-title {
            color: white;
            font-size: 32px;
            margin: 0;
            position: relative;
        }
        .save-button {
            background-color: rgb(1, 195, 198);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            transition: background-color 0.3s;
        }
        .save-button:hover {
            background-color:rgb(1, 195, 198);
        }
        .star-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(4, 1fr);
            z-index: 1;
            overflow: hidden;
        }
        .profile-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            position: relative;
            z-index: 2;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        .card-content {
            color: #666;
        }
        .text-input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #555;
            background-color: #f9f9f9;
        }
        .text-input[readonly] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
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

<section class="profile-section">
    <div class="star-pattern"></div>
    <form id="formPerfil" action="{{ route('adminPerfil.update', $perfil->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="profile-header">
            <h1 class="profile-title">Mi perfil</h1>
            <div class="space-x-4">
                <button type="button" id="editBtn" class="save-button">Editar</button>
                <button type="submit" id="saveBtn" class="save-button hidden">Guardar Cambios</button>
            </div>
        </div>

        <div class="profile-cards">
            <div class="card">
                <div class="card-title"><span>Empresa</span></div>
                <div class="card-content">
                    <input type="text" name="empresa" value="{{ $perfil->empresa }}" class="text-input" readonly>
                </div>
            </div>

            <div class="card">
                <div class="card-title"><span>Encargado</span></div>
                <div class="card-content">
                    <input type="text" name="encargado" value="{{ $perfil->encargado }}" class="text-input" readonly>
                </div>
            </div>

            <div class="card">
                <div class="card-title"><span>Correo</span></div>
                <div class="card-content">
                    <input type="email" name="correo" value="{{ $perfil->correo }}" class="text-input" readonly>
                </div>
            </div>

            <div class="card">
                <div class="card-title"><span>Teléfono y dirección</span></div>
                <div class="card-content">
                    <input type="tel" name="telefono" value="{{ $perfil->telefono }}" class="text-input" readonly>
                    <input type="text" name="direccion" value="{{ $perfil->direccion }}" class="text-input mt-2" readonly>
                </div>
            </div>

            <div class="card">
                <div class="card-title"><span>Estatus</span></div>
                <div class="card-content">
                <select name="estatus" class="text-input" id="estatus" disabled>
                    <option value="activo" {{ $perfil->estatus == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $perfil->estatus == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
                </div>
            </div>

            <div class="card">
                <div class="card-title"><span>Razón Social</span></div>
                <div class="card-content">
                    <input type="text" name="razon_social" value="{{ $perfil->razon_social }}" class="text-input" readonly>
                </div>
            </div>
        </div>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButton = document.getElementById('editBtn');
        const saveButton = document.getElementById('saveBtn');
        const inputs = document.querySelectorAll('.text-input');

        editButton.addEventListener('click', function () {
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.removeAttribute('disabled'); 
            });
            saveButton.style.display = 'inline-block';
        });
    });
</script>


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
