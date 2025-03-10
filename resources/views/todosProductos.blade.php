<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¡Pow! Cómics - Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
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

  
  <main class="flex-grow">
    <div class="container mx-auto p-4">
      <div class="relative bg-gray-400 rounded-lg p-8 mb-8">
        <div class="absolute inset-0 overflow-hidden" style="background-image: url('/api/placeholder/1200/300'); background-size: cover; opacity: 0.3;"></div>
        <div class="absolute top-0 left-0 w-full h-full" id="burstsContainer"></div>
        <div class="flex justify-between items-center relative z-10">
          <h1 class="text-4xl font-bold text-white">Mis Productos</h1>
          <a id="addProductButton" class="bg-black text-white px-4 py-2 rounded" href="{{ route('productosRegistro') }}">
          Agregar Producto
          </a>
        </div>
      </div>

      
      <div class="space-y-4" id="productList"></div>
    </div>
  </main>

  
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
    
    let products = [
      {
        id: 1,
        name: "The Amazing Spider-Man #25",
        price: 79.00,
        currency: "MXN",
        image: "/api/placeholder/120/180",
        stock: 5,
        
      },
      {
        id: 2,
        name: "X-Men Vol.46",
        price: 149.00,
        currency: "MXN",
        image: "/api/placeholder/120/180",
        stock: 3,
        
      },
      {
        id: 3,
        name: "Daredevil Vol.01",
        price: 169.00,
        currency: "MXN",
        image: "/api/placeholder/120/180",
        stock: 7,
        
      }
    ];

    function renderProducts() {
      const productList = document.getElementById('productList');
      productList.innerHTML = ''; 

      products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'bg-white rounded-lg shadow-md overflow-hidden';

        productDiv.innerHTML = `
          <div class="p-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
              <img src="${product.image}" alt="${product.name}" class="w-20 h-28 object-cover rounded" />
              <div>
                <h3 class="text-lg font-semibold">${product.name}</h3>
                <p class="text-gray-600">$${product.price.toFixed(2)} ${product.currency}</p>
                <div class="mt-2 text-sm text-gray-500">
                  Stock disponible: <span class="${product.stock < 3 ? 'text-red-500 font-bold' : 'text-green-600 font-bold'}">${product.stock} unidades</span>
                </div>
              </div>
            </div>
            <div class="flex items-center space-x-4">
              
              <button class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full" onclick="handleDelete(${product.id})">
                <!-- Ícono Trash -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a2 2 0 012 2v2H8V5a2 2 0 012-2z" />
                </svg>
              </button>
            </div>
          </div>
          ${product.quantity > 0 ? `
            <div class="bg-gray-100 p-3 text-right">
              <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm">
                Agregar
              </button>
            </div>
          ` : ''}
        `;
        productList.appendChild(productDiv);
      });
    }

    
    function handleDelete(id) {
      if (confirm("Si eliminas este producto se perdera ¿estas seguro?")) {
        products = products.filter(product => product.id !== id);
        renderProducts();
      }
    }

    function handleQuantityChange(id, newQuantity) {
      products = products.map(product => {
        if (product.id === id) {
          return {
            ...product,
            quantity: Math.max(0, Math.min(newQuantity, product.stock))
          };
        }
        return product;
      });
      renderProducts();
    }

    function renderBursts() {
      const burstsContainer = document.getElementById('burstsContainer');
      burstsContainer.innerHTML = '';
      for (let i = 0; i < 20; i++) {
        const burst = document.createElement('div');
        burst.className = 'absolute';
        const posX = Math.random() * 100;
        const posY = Math.random() * 100;
        burst.style.top = posY + '%';
        burst.style.left = posX + '%';
        burst.style.width = '40px';
        burst.style.height = '40px';
        burst.style.background = '#00CC00';
        burst.style.clipPath = 'polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%)';
        burst.style.zIndex = '0';
        burstsContainer.appendChild(burst);
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      renderProducts();
      renderBursts();
    });
  </script>
</body>
</html>