# creando clases y objetos

class Restaurante:
    def agregar_restaurante(self,nombre): # el self es lo que se requiere para guardar la informacion
        self.nombre = nombre #atributo de la clase aqui es donde se almacena los datos del restaurante
        print(f"agregar restaurante...{self.nombre}")
    def mostrar_informacion(self):
        print(f"el nombre del restaurante es: {self.nombre}")
        
        

class carro:
    def agregar_carro(self,marca,modelo,color):
        self.marca = marca
        self.modelo = modelo
        self.color = color
        print(f"agregar carro...{self.marca,self.modelo, self.color}")

carro = carro()
carro.agregar_carro("fiat", "palio", "azul")
print(f"la marca de mi carro es: {carro.marca}") #imprimir objetos
carro2 = carro()
carro2.agregar_carro("ford", "fortuna", "negro")
print(f"la marca de mi carro es: {carro.marca}el modelo: {carro2.modelo} el color: {carro2.color}")

#instanciar la clase
restaurante2 = restaurante()
restaurante2.agregar_restaurante("el pollo loco")
restaurante2.mostrar_informacion()

#puedo crear diferentes objetos usando una misma clase
restaurante2 = restaurante()
restaurante2.agregar_restaurante("el cochino andante")
restaurante2.mostrar_informacion()

#imprimir los objetos
print(f"el nombre del restaurante es: {restaurante.nombre}")
print(f"el nombre del restaurante es: {restaurante2.nombre}")

class Sitio_turisticos:
    def agregar_Sitio_turisticos(self,nombre,ubicacion,costo,hospedajes):
        self.nombre = nombre
        self.ubicacion = ubicacion
        self.costo = costo
        self.hospedajes = hospedajes
        print(f"agregar Sitio_turisticos...{self.nombre,self.ubicacion,self.costo,self.hospedajes }")
    def mostrar_Sitio_turisticos(self):
       print(f"el sitio turistico es: {self.nombre}")

Sitio_turisticos = Sitio_turisticos()
Sitio_turisticos.agregar_Sitio_turisticos("isla del sol","estado falcon","150$","incluido en el costo")
Sitio_turisticos.mostrar_Sitio_turisticos()
Sitio_turisticos2 = Sitio_turisticos()
Sitio_turisticos2.agregar_Sitio_turisticos("isla margarita","estado nueva esparta","200$","no incluido en el costo")
Sitio_turisticos2.mostrar_Sitio_turisticos()



    