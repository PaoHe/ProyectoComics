<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Mi Carrito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
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
                <a href="{{ route('misPedidos') }}" class="text-white hover:text-yellow-400">Mis Pedidos</a>
                <a href="{{ route('misCompras') }}" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="{{ route('membresia') }}" class="text-white hover:text-yellow-400">Mi Membresía</a>
                <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>
                <a href="{{ route('carrito') }}" class="text-white hover:text-yellow-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1.5 9H5.5L4 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4zm1-8h10M5 6h12" />
                    </svg>
                </a>

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

        <div class="relative z-10 flex flex-grow p-6">
            <main class="flex-grow space-y-6 mx-auto max-w-xl">
                <h2 class="text-4xl font-bold mb-4">¡Mi Carrito!</h2>
                <div class="space-y-4" id="cartItems"></div>
                <div class="mt-6">
                    <h3 class="text-xl font-semibold">Total de productos: <span id="totalAmount">$0.00 MXN</span></h3>
                    <button class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300" id="proceedToCheckout">Proceder al pago</button>
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-black text-white py-6 mt-auto">
        <div class="text-center">
            <h3 class="font-bold text-lg">Preventas Exclusivas</h3>
            <p>DC Comics</p>
            <p>Marvel Comics</p>
            <p>Panini Comics</p>
        </div>
    </footer>

    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
        <div class="bg-gray-800 text-white rounded-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-2xl font-bold mb-4">¡Compra Realizada!</h2>
            <p>Gracias por tu compra. Tu pedido ha sido procesado.</p>
            <button id="closeModal" class="mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500">Cerrar</button>
        </div>
    </div>

    <script>
        let cartItems = [
            {
                id: 1,
                name: "The Amazing Spider-Man #25",
                price: 79.00,
                currency: "MXN",
                image: "imagenes/The Amazing Spider-Man.jpeg",
                quantity: 1
            },
            {
                id: 2,
                name: "X-Men Vol.46",
                price: 149.00,
                currency: "MXN",
                image: "imagenes/61wG-X-Men Vol.46.jpg",
                quantity: 1
            }
        ];

        function renderCartItems() {
            const cartItemsContainer = document.getElementById('cartItems');
            cartItemsContainer.innerHTML = '';

            cartItems.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'bg-white text-black p-4 rounded-lg shadow-lg flex items-center mb-6 relative';

                itemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">${item.name}</h3>
                        <p class="text-gray-700">$${item.price.toFixed(2)} ${item.currency}</p>
                        <label for="quantity${item.id}" class="block mt-2">Cantidad:</label>
                        <select id="quantity${item.id}" class="border rounded p-1" onchange="updateQuantity(${item.id}, this.value)">
                            <option value="1" ${item.quantity === 1 ? 'selected' : ''}>1</option>
                            <option value="2" ${item.quantity === 2 ? 'selected' : ''}>2</option>
                            <option value="3" ${item.quantity === 3 ? 'selected' : ''}>3</option>
                        </select>
                    </div>
                    <button class="bg-red-500 text-white px-4 py-2 rounded ml-4" onclick="removeFromCart(${item.id})">Eliminar</button>
                `;
                cartItemsContainer.appendChild(itemDiv);
            });
        }

        function updateQuantity(id, quantity) {
            cartItems = cartItems.map(item => item.id === id ? { ...item, quantity: parseInt(quantity) } : item);
            renderCartItems();
            updateTotal();
        }

        function removeFromCart(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                cartItems = cartItems.filter(item => item.id !== id);
                renderCartItems();
                updateTotal();
            }
        }

        function updateTotal() {
            const totalAmount = cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);
            document.getElementById('totalAmount').innerText = `$${totalAmount.toFixed(2)} MXN`;
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderCartItems();
            updateTotal();

            document.getElementById('proceedToCheckout').addEventListener('click', function() {
                document.getElementById('modal').classList.remove('hidden');
            });

            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });
        });
    </script>
</body>
</html>