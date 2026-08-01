class producto:
    def __init__(self, nombre, precio, stock):
        self.nombre = nombre
        self.precio = precio
        self.stock = stock
    
    def mostrar_info(self):
        print(f"Nombre: {self.nombre}")
        print(f"Precio: {self.precio}")
        print(f"Stock: {self.stock}")
    def actualizar_stock(self, cantidad):
        self.stock += cantidad
        print(f"Stock actualizado: {self.stock}")
    def precio_total(self, cantidad):
        total = self.precio * cantidad
        print(f"Precio total por {cantidad} unidades de {self.nombre}: {total}")
        return total

producto1 = producto("harina pan", 10)
producto1 = actualizar_stock(8)
producto1 = precio_total( 20)
    
    

   
    