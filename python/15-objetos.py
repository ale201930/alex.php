#objetos 
#un objeto como ya sabemos es similar a un array, te permite agrupar contenido
#diferentes tipos de datos
#aqui se conocen como diccionarios

cancion = {
    'artista': 'ricardo arjona',
    'nombre': 'el problema'
}

#acceder a los elementos del dicionario
print(cancion['artista'])
artista = cancion['artista']
print(artista)

#agregar un key al diccionario
cancion['playlist_id'] = 'romantica'
print(cancion)

#eliminar el valor de un diccionario
del cancion['playlist_id']
print(cancion)

moto = {
    'marca': 'Empire',
    'modelo': 'rk 250'
}

print(moto['marca'])
marca = moto['marca']
print(moto)

moto['tipo_moto'] = 'sniker'
print(moto)

del moto['tipo_moto']
print(moto)
