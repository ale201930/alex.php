#operadores de comparacion
#== igual a
# != diferente de
# < menor que
# > mayor que
#<= menor o igual que
# >= mayor o igual que

a = 5
b = 3
igual = a == b # igual es false
diferente = a != b # diferente es true
mayor = a >= b # mayor es true



#condicional

ahorro = 100
if ahorro >=50:
    print("nos vamos de viaje")
else:
    print("no tenemos ahorros")
    

#revisamos si un valor es diferente en python string
lenguaje = 'javacript'
if not lenguaje == 'python':
    print(f'super eres un crack de {lenguaje}')
else:
    print(f'no eres un crack de {lenguaje}')



#evaluacion boolean
usuario_autenticado = False
if usuario_autenticado:
    print('el usuario se autentico con exito')
else:
    print('el usuario no se autentico vuelva a intentarlo')





#condicionales con list
superheroes =['superman','spiderman','mujer maravilla','hercules']
if 'superman' in superheroes:
    print('amas a superman')
else:
    print('tu superheroe no es batman')

tiposUsuarios= ['admin','superadmin','invitado']
if 'admin' in tiposUsuarios:
    print('tienes acceso a todo menos a borrar la bitacora')
else:
    print('no eres admin')

tiposMateria= ['matematica','lenguaje','base de datos']
if 'algebra' in tiposMateria:
    print('sabes muchisimo algebra te felicito')
else:
    print('no sabes nada de algebra')
