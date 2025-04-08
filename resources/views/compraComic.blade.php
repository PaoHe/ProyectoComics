<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto['titulo'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <div class="relative flex flex-col flex-grow" 
         style="background-image: url('{{ asset('Fondo 1.png') }}'); 
                background-size: auto;
                background-repeat: repeat;
                background-position: center;">

        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>

        <nav class="relative z-20 bg-black p-4 flex justify-between items-center">
            <div class="text-2xl font-bold">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('tiendaCliente') }}" class="text-white hover:text-yellow-400">Cómics</a>
                <a href="{{ route('misPedidos') }}" class="text-white hover:text-yellow-400">Mis Pedidos</a>
                <a href="{{ route('misCompras') }}" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="{{ route('membresia') }}" class="text-yellow-400">Mi Membresía</a>
                <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>
            </div>
        </nav>

        <div class="flex-grow flex flex-col items-center p-6 relative z-20">
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-3xl w-full">
                <div class="flex flex-col lg:flex-row items-center lg:items-start">
                    <img src="{{ asset('imagenes/' . $producto['imagen']) }}" 
                         alt="{{ $producto['titulo'] }}" 
                         class="w-64 h-80 rounded-lg mb-6 lg:mb-0 lg:mr-6 object-cover shadow-lg">
                    <div class="text-center lg:text-left">
                        <h1 class="text-3xl font-bold mb-4">{{ $producto['titulo'] }}</h1>
                        <p class="text-yellow-400 text-2xl font-semibold mb-4">${{ number_format($producto['precio'], 2) }}</p>
                        <p class="text-gray-300 mb-6">{{ $producto['descripcion'] }}</p>

                        <!-- Formulario de pago -->
                        <form id="pagoForm" method="POST">
                            @csrf
                            <input type="hidden" name="comic_id" value="{{ $producto['id'] }}">
                            <div class="mb-4">
                                <label for="cantidad" class="text-gray-300 text-lg block mb-2">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" min="1" value="1" 
                                       class="bg-gray-700 text-white text-lg px-4 py-2 rounded-lg shadow-lg 
                                              focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                            </div>

                            <!-- PayPal Button -->
                            <div id="paypal-button-container" class="mt-6"></div>
                        </form>
                    </div>
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

    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=ARUf5SAe_ul5CCfBk0jw7Rp4uzd88JMIH7zedhHXhu43lWe7Z1p3BQvroKCqf5wgpMY5GNlenNeI-Ya1&currency=MXN"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const productId = {{ $producto['id'] }};
            const precioUnitario = {{ number_format($producto['precio'], 2, '.', '') }};

            paypal.Buttons({
                createOrder: function(data, actions) {
                    const cantidad = document.getElementById('cantidad').value;
                    const total = (precioUnitario * cantidad).toFixed(2);

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: total
                            },
                            description: 'Compra de cómic',
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Pago realizado por: ' + details.payer.name.given_name);

                        fetch('/api/pago/exito', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                orderID: data.orderID,
                                comic_id: productId,
                                cantidad: document.getElementById('cantidad').value
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            console.log('Pago registrado:', data);
                            window.location.href = '/misCompras';
                        })
                        .catch(error => {
                            console.error('Error al registrar el pago:', error);
                        });
                    });
                },
                onError: function(error) {
                    console.error('Error en el pago de PayPal:', error);
                    alert('Ocurrió un error durante el proceso de pago. Por favor, intenta de nuevo.');
                }
            }).render('#paypal-button-container');
        });
    </script>

</body>
</html>
