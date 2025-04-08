from fastapi import FastAPI
from pydantic import BaseModel
from typing import List
from fastapi.responses import JSONResponse

app = FastAPI()

class Product(BaseModel):
    id: int
    nombre: str
    precio: str
    descripcion: str
    imagen: str
    cantidad: int = 1  

# BD provicional 
productos = {
    1: {"nombre": "Deadpool Vol.05", "precio": "$299.00", "descripcion": "Es insoportable, peligroso y... huele fatal. Pero al público le encanta.", "imagen": "Deadpool Vol.05.jpg"},
    2: {"nombre": "Incredible Hulk Vol.01", "precio": "$399.00", "descripcion": "Mientras un enfurecido Hulk...", "imagen": "Incredible Hulk Vol.01.jpg"},
    3: {"nombre": "Star Wars De Gillen & Pak", "precio": "$1,533.00", "descripcion": "Con la tensión en aumento en la Galaxia...", "imagen": "Star Wars De Gillen & Pak.jpeg"},
    4: {"nombre": "The Amazing Spider-Man #25", "precio": "$79.00", "descripcion": "Este número marca el inicio de una etapa crucial...", "imagen": "The Amazing Spider-Man.jpeg"},
    5: {"nombre": "Punisher De Mike Baron", "precio": "$579.00", "descripcion": "La cruzada de Punisher contra el crimen...", "imagen": "Punisher De Mike Baron.jpeg"},
    6: {"nombre": "Daredevil Vol.01", "precio": "$1,235.00", "descripcion": "Es una nueva era para Nueva York y para el Hombre Sin Miedo...", "imagen": "Daredevil Vol.01.jpeg"}
}

carrito = {}

@app.get("/products", response_model=List[Product])
def get_products():
    return [Product(id=id, **product) for id, product in productos.items()]

@app.get("/products/{product_id}", response_model=Product)
def get_product(product_id: int):
    product = productos.get(product_id)
    if product:
        return Product(id=product_id, **product)
    return JSONResponse(status_code=404, content={"message": "Producto no encontrado"})

@app.post("/carrito/{product_id}")
def agregar_al_carrito(product_id: int, cantidad: int = 1):
    if product_id in productos:
        producto = productos[product_id]
        producto['cantidad'] = cantidad
        carrito[product_id] = producto
        return {"message": "Producto agregado al carrito", "producto": producto}
    return JSONResponse(status_code=404, content={"message": "Producto no encontrado"})

@app.get("/carrito")
def ver_carrito():
    if not carrito:
        return JSONResponse(status_code=404, content={"message": "El carrito está vacío"})
    return {"carrito": carrito}
