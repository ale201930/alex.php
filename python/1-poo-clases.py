class Carro:
    def __init__(self, marca, modelo, color): #este es el constructor de la clase.
        #es un metodo especial que se ejecuta automaticamente cuando se crea un nuevo objeto
        self.marca = marca
        self.modelo = modelo
        self.color = color
        self.encendido = False

# es una convencion en python. self representa la instancia del objeto que se esta creando.
    def encender(self):
        self.encendido = True
        print("el carro ha encendido.")
    
    def apagar(self):
        
        self.encendido = False
        print("el carro ha apagado.")
        
    def acelerar(self):
         if self.encendido:
            print("el carro esta acelerando")
         else:
            print("el carro debe estar encendido para poder acelerar")

# creamos un objeto (instancia) de la clase carro
mi_carro = Carro("toyota", "corolla", "rojo")

#acceder a los atributos del objeto
print(mi_carro.marca) # Imprime: toyota

#llamar a un metodo del objeto
mi_carro.encender()
mi_carro.acelerar()


class Persona:
    def __init__(self, nombre, edad):
        self.nombre = nombre
        self.edad = edad
        
    def saludar(self):
        print(f"Hola, mi nombre es {self.nombre} y tengo {self.edad} años.")
    
    def cumplir_anios(self):
        self.edad += 1
        print(f"Feliz cumpleaños! Ahora tengo {self.edad} años.")

mi_persona = Persona("Jenny", 42)
mi_persona.saludar()
mi_persona.cumplir_anios()


class Futbol:
   
    def __init__(self, seleccion, copa_del_mundo, ganador):
        self.seleccion = seleccion
        self.copa_del_mundo = copa_del_mundo
        self.ganador = ganador
        
    def mostrar_seleccion(self):
        print(f"Hola, Argentina qué pro eres. '{self.seleccion}' y es la copa del mundo {self.copa_del_mundo}")
    
    def mostrar_copa(self):
        print(f"Es la copa del mundo {self.copa_del_mundo}")
    
    def mostrar_ganador(self):
        print(f"Brillante Argentina, ganaste la copa del mundo: {self.ganador}")


mi_seleccion = Futbol(
    seleccion="La tercera ya llegó", 
    copa_del_mundo=2026, 
    ganador="Argentina"
)

mi_seleccion.mostrar_seleccion()
mi_seleccion.mostrar_copa()
mi_seleccion.mostrar_ganador()
        