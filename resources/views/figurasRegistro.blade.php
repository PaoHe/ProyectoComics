<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f8f8f8;
        }
        
        .product-container {
            background-color: #777;
            position: relative;
            padding: 20px;
            background-image: repeating-linear-gradient(45deg, #777, #777 20px, #666 20px, #666 40px);
            overflow: hidden;
        }
        
        .burst {
            position: absolute;
            width: 80px;
            height: 80px;
            background-color: #00cc00;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
        
        .product-card {
            display: flex;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            margin: 40px auto;
            max-width: 1000px;
            position: relative;
            z-index: 1;
        }
        
        .product-image {
            flex: 1;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .product-image img {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
        }
        
        .product-details {
            flex: 1;
            padding: 30px;
            background-color: #222;
            color: white;
        }
        
        .product-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .product-price {
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        
        .quantity-selector {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        .add-to-cart {
            width: 100%;
            padding: 15px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 20px;
        }
        
        .add-to-cart:hover {
            background-color: #333;
        }
        
        .product-description {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            color: #333;
            margin-top: 20px;
        }
        
        .description-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }
        
        .description-content {
            line-height: 1.6;
        }
        
        .description-row {
            display: flex;
            margin-bottom: 8px;
        }
        
        .description-row span:first-child {
            font-weight: bold;
            width: 150px;
        }
        
        .bursts-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
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
    
    <div class="product-container">
        <div class="bursts-container">

        </div>
        
        <div class="product-card">
            <div class="product-image">
                <input type="file" id="imageUpload" accept="image/*" class="form-control">

            </div>
            <div class="product-details">
                <input type="text" class="product-title-input" placeholder="Set de juego hasbro Marvel" style="width: 100%; font-size: 24px; margin-bottom: 20px; padding: 8px; border: 1px solid #555; background-color: #333; color: white;">
                <div class="product-price-container" style="display: flex; align-items: center; margin-bottom: 30px;">
                    <span style="font-size: 30px; margin-right: 5px;">$</span>
                    <input type="text" class="product-price-input" placeholder="1,393.00" style="width: 80%; font-size: 42px; font-weight: bold; padding: 5px; border: 1px solid #555; background-color: #333; color: white;">
                </div>
                
                <select class="quantity-selector">
                    <option>Cantidad de Registro</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                </select>
                
                <button class="add-to-cart">Añadir registro</button>
                <button class="add-to-cart" style="background-color: #444; margin-top: 10px;">Guardar cambios</button>
                
                <div class="product-description">
                    <div class="description-title">
                        Descripción y especificaciones:
                    </div>
                    <div class="description-content">
                        <div class="description-row">
                            <span>Detalles del artículo:</span>
                            <span><input type="text" placeholder="Set de figuras de acción" style="width: 100%; padding: 5px;"></span>
                        </div>
                        <div class="description-row">
                            <span>Tamaño:</span>
                            <span><input type="text" placeholder="31.8 cm" style="width: 100%; padding: 5px;"></span>
                        </div>
                        <div class="description-row">
                            <span>Material:</span>
                            <span><input type="text" placeholder="Plástico" style="width: 100%; padding: 5px;"></span>
                        </div>
                        <div class="description-row">
                            <span>Peso:</span>
                            <span><input type="text" placeholder="0.79" style="width: 100%; padding: 5px;"></span>
                        </div>
                        <div class="description-row">
                            <span>Modelo:</span>
                            <span><input type="text" placeholder="E4252" style="width: 100%; padding: 5px;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
    
    <script>
        const burstsContainer = document.querySelector('.bursts-container');
        const numberOfBursts = 40;
        
        for (let i = 0; i < numberOfBursts; i++) {
            const burst = document.createElement('div');
            burst.className = 'burst';
            
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            
            const size = 30 + Math.random() * 60;
            
            burst.style.left = ${posX}%;
            burst.style.top = ${posY}%;
            burst.style.width = ${size}px;
            burst.style.height = ${size}px;
            
            burstsContainer.appendChild(burst);
        }
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('comicImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </script>
</body>
</html>