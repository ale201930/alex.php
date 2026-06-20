#condicionales and or or
#and revisa que ambas condiciones sean verdaderas
#or revisa al menos una de las condicones se cumpla 1
acceso_usuario = True
acceso_admin = False
if acceso_usuario and acceso_admin:
    print ('acceso total')
elif acceso_usuario:
    print('el usuario esta autenticado')
else:
    print ('el usuario no esta autenticado')
    