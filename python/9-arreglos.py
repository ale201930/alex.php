meses= ["octubre", "febrero", "marzo"]
print(meses)
meses.sort()
print(meses[1]) #para imprimir la posicion en especifico
print(meses)
#obtener datos dentro de un arreglos

aprendiendo =f'estamos en el mes de {meses[0]}'
print(aprendiendo)

#reemplazar el valor de un arreglo
meses[2]= "noviembre"
print(meses)

#ordenar elementos de la list
#por defecto, sort() ordena los elementos en orden ascendente
#basado en la representacion unicode de los elementos
#esto significa que los numeros se ordenan numericamente
#las cadenas se ordenan alfabeticamente 