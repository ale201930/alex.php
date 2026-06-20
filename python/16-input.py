nombre = input('cual es tu nombre?\r\n') # retorno del carrete \n
print(f'tu nombre es {nombre}')


edad = input('cual es tu edad?\r\n')
#convertir edad en un entero
edad = int(edad) #float #str

if edad >=18:
    print(f'eres mayor de edad y puedes votar')
else:
    print(f'lo sentimos aun eres un bebe')
    
#caso que un usuario ingrese otro valor que no sea numero
edad = input('cual es tu edad?')
try:
    edad = int(edad)
    if edad >= 18:
        print(f'eres mayor de edad y puedes votar')
    else:
        print(f'aun no lo tienes la edad para votar')
except ValueError:
    print("por favor, ingresa un numero valido para la edad")
    
