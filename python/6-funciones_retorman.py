# funciones que retornan un valor
def info(nombre):
    return nombre
empleado = info("alexander almaguer")
empleado2 = info("maria lopez")
print(empleado)
print(empleado2)

def  sumar(a,b):
    return a + b
resultado = sumar(15,13)
print(resultado)

def pizza (f  ="margarita", g="peperoni", h="hawaiana"):
    return f,g,h
pizzaCocinada = pizza()
print(pizzaCocinada)


def vehiculo (a,b):
    return a,b
vehiculo1= vehiculo("carro","kilometros 300000")
resultado= vehiculo1[0]
print(resultado)
print(vehiculo1)
vehiculo2= vehiculo("moto"," kilometros 400000")
resultado= vehiculo2[0]
print(resultado)
print(vehiculo2)
print(f"el vehiculo 1 es un {vehiculo1[0]} con {vehiculo1[1]} y el vehiculo 2 es una {vehiculo2[0]} con {vehiculo2[1]}")
