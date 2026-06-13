def informacion(nombre, cargo="aprendiz"): #declaras la funcion con parametros
    print(f" soy {nombre} y mi cargo es {cargo}")
informacion("alexander almaguer", "desarrollador") #parametros

def usuario (usuario, password, tipoUsuario="invitado"):
    print(f"el usuario es {usuario}, su contraseña es {password} y su tipo de usuario es {tipoUsuario}")
usuario("webmaster", "123")

def telefono (marca, modelo, ram=4):
    print(f"el telefono es de la marca {marca} y el modelo es {modelo}")
    print(f"la memoria ram es {ram}")
telefono("Samsung", "Galaxy S21")