#condicional el if elif else

tipo = 'estudiante'
if tipo=='estudiante':
    print('tienes un descuento del 50%')
elif tipo=='profesor':
    print('tienes un descuento del 80%')
elif tipo=='invitado':
    print('tienes un descuento del 10%')
else:
    print('no hay descuento')
    
usuario = 'romanlg'
tipoUsuario = 'invitado'
tiposUsuarios = ['admin', 'superadmin', 'invitado']

if tipoUsuario in tiposUsuarios and usuario == 'romanlg':
    if tipoUsuario== 'superadmin':
        print('acceso total')
    elif tipoUsuario=='admin':
        print('el usuario es admin')
    else:
        print('el usuario es invitado')
else:
        print('el usuario no puede entrar al sistema')
        
        