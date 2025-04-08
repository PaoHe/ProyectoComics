<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Registro de Figura</title>
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
        .product-details {
            flex: 1;
            padding: 30px;
            background-color: #222;
            color: white;
        }
        .product-description {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            color: #333;
            margin-top: 20px;
        }
        .description-row {
            display: flex;
            margin-bottom: 8px;
        }
        .description-row span:first-child {
            font-weight: bold;
            width: 150px;
        }
        .quantity-selector {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            color: black;
        }
    </style>
</head>

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

<form action="{{ route('figuras.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="product-container">
        <div class="product-card">
            <div class="product-image">
                <input type="file" id="imageUpload" name="imagen" accept="image/*" class="form-control">
            </div>
            <div class="product-details">
                <input type="text" name="nombre" class="product-title-input" placeholder="Nombre del producto"
                    style="width: 100%; font-size: 24px; margin-bottom: 20px; padding: 8px; border: 1px solid #555; background-color: #333; color: white;">

                <div style="display: flex; align-items: center; margin-bottom: 30px;">
                    <span style="font-size: 30px; margin-right: 5px;">$</span>
                    <input type="text" name="precio" class="product-price-input" placeholder="Precio"
                        style="width: 80%; font-size: 42px; font-weight: bold; padding: 5px; border: 1px solid #555; background-color: #333; color: white;">
                </div>

                <select class="quantity-selector" name="stock_actual">
                    <option disabled selected>Cantidad de Registro</option>
                    @for($i = 1; $i <= 50; $i += ($i < 10 ? 1 : 5))
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <div class="product-description">
                    <div class="description-title font-bold mb-2">Descripción y especificaciones:</div>
                    <div class="description-content">
                        <div class="description-row">
                            <span>Descripción:</span>
                            <input type="text" name="descripcion" placeholder="Set de figuras de acción"
                                style="width: 100%; padding: 5px;">
                        </div>
                        <div class="description-row">
                            <span>SKU:</span>
                            <input type="text" name="sku" placeholder="Código único"
                                style="width: 100%; padding: 5px;">
                        </div>
                        <div class="description-row">
                            <span>Editorial/Marca:</span>
                            <input type="text" name="editorial_o_marca" placeholder="Hasbro, Bandai, etc."
                                style="width: 100%; padding: 5px;">
                        </div>
                        <div class="description-row">
                            <span>Fecha lanzamiento:</span>
                            <input type="date" name="fecha_lanzamiento" style="width: 100%; padding: 5px;">
                        </div>
                        <div class="description-row">
                            <span>Proveedor:</span>
                            <select name="id_proveedor" style="width: 100%; padding: 5px;">
                                <option value="">Seleccionar proveedor</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="add-to-cart"
                    style="background-color:rgb(255, 238, 0); color: black; font-weight: bold; font-size: 16px; padding: 12px 20px; margin-top: 20px; border-radius: 8px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); display: block; width: 100%;">
                    Guardar Figura
                </button>
            </div>
        </div>
    </div>
</form>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    });
</script>
@endif

</body>
</html>