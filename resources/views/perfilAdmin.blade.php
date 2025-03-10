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
        
        .text-input:focus {
            outline: none;
            border-color: #00cc00;
            box-shadow: 0 0 3px rgba(0, 204, 0, 0.3);
        }
        
        .text-input[readonly] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
        
        .edit-icon {
            cursor: pointer;
        }
        
    </style>
</head>
<body>
<header class="bg-white p-4 shadow-sm">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <div class="text-3xl font-bold">¡Pow! <span class="text-gray-600">Cómics</span></div>
      </div>
      <nav class="hidden md:flex space-x-6">
          <a href="{{ route("todosProductos") }}">Productos</a>
          <a href="{{ route("productosRegistro")}}">Registro de Producto</a>
          <a href="{{ route("perfilAdmin")}}">Mi perfil</a>
      </nav>
      <div class="flex items-center">
        <button class="p-2 rounded-full bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </button>
      </div>
    </div>
  </header>
    
    <section class="profile-section">
        <div class="star-pattern">
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
            <div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>
        </div>
        
        <div class="profile-header">
            <h1 class="profile-title">Mi perfil</h1>
            <button class="save-button">Guardar datos</button>
        </div>
        
        <div class="profile-cards">
            <div class="card">
                <div class="card-title">
                    <span>Empresa</span>
                    
                </div>
                <div class="card-content">
                    <input type="text" placeholder="Empresa 01" class="text-input">
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <span>Encargado</span>
                    
                </div>
                <div class="card-content">
                    
                    <input type="text" placeholder="Rachel Zane" class="text-input">
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <span>Correo</span>
                    
                </div>
                <div class="card-content">
                    <input type="email" placeholder="Usuario@gmail.com" class="text-input">
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <span>Telefono y dirección</span>
                </div>
                <div class="card-content">
                    <input type="tel" placeholder="442 999 9999" class="text-input">
                    <input type="text" placeholder="Col. XX Calle: XXX No.XX" class="text-input" style="margin-top: 8px;">
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <span>Estatus</span>
                </div>
                <div class="card-content">
                    <input type="text" placeholder="Activo" class="text-input">
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">
                    <span>Razón Social</span>
                </div>
                <div class="card-content">
                    <input type="text" placeholder="Comics y Articulos S.A. de C.V." class="text-input">
                </div>
            </div>
        </div>
    </section>
    
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