playlists = {} # se crea el diccionario vacio

def crear_playlist():
    nombre_playlist = input ("como deseas nombrar tu playlist:/n")
    playlists[nombre_playlist] = []
    return nombre_playlist
#funcion que retornan un valor en este caso el nombre de la playlist

def agregar_canciones(nombre_playlist):
    print(f"agregando canciones a la playlist {nombre_playlist}")
    while True:
        cancion = input("ingresa el nombre de la cancion (o 'salir' para terminar): ")
        if cancion.lower() == "salir":
            break
        playlists[nombre_playlist].append(cancion)

def eliminar_canciones(nombre_playlist):
    print(f"eliminando canciones de la playlist {nombre_playlist}")
    while True:
       cancion_eliminar = input("ingresa el nombre de la cancion a eliminar (o 'salir' para terminar): ")
       if cancion_eliminar.lower() == "x":
            break
       if cancion_eliminar in playlists[nombre_playlist]:
            playlists[nombre_playlist].remove(cancion_eliminar)
            print(f"la cancion {cancion_eliminar} ha sido eliminada de la playlist {nombre_playlist}")

def mostrar_playlist():
    if not playlists:
        print("no hay playlists disponibles.")
    else:
        for nombre_playlist, canciones in playlists.items():
            print(f"playlist: {nombre_playlist}")
            for cancion in canciones:
                print(f"- {cancion}")

def app():
    while True:
        print("/n Menu:")
        print("1. crear una nueva playlist")
        print("2. agregar canciones a una playlist")
        print("3. eliminar canciones de una playlist")
        print("4. mostrar todas las playlist")
        print("5. salir")
        
        opcion = input("selecciona una opcion:")
        
        if opcion == "1" :
            nombre_playlist = crear_playlist()
            agregar_canciones(nombre_playlist)
        elif opcion == "2" :
            if nombre_playlist in playlists:
                agregar_canciones(nombre_playlist)
            else:
                print("la playlist no existe")
        elif opcion == "3":
            nombre_playlist = input ("de que playlist deseas eliminar canciones")
            if nombre_playlist in playlists:
                eliminar_canciones(nombre_playlist)
            else:
                print("la playlist no existe.")
        elif opcion == "4":
            mostrar_playlist()
        elif opcion == "5":
            break
        else:
            print("opcion invalida")
app()         