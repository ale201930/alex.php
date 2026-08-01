from conexion import conectar_bd
import mysql.connector

def crear_registro(conexion, ID_Paciente, Nombre, Apellido, Cedula, Sexo, Correo, Telefono, Direccion, Ciudad, Fecha_nacimiento, ID_sangre, Region):
    cursor = conexion.cursor()
    sql = "INSERT INTO paciente ( ID_Paciente, Nombre, Apellido, Cedula, Sexo, Correo, Telefono, Direccion, Ciudad, Fecha_nacimiento, ID_sangre, Region) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    valores = ( ID_Paciente, Nombre, Apellido, Cedula, Sexo, Correo, Telefono, Direccion, Ciudad, Fecha_nacimiento, ID_sangre, Region)
    cursor.execute(sql, valores)
    conexion.commit()
    print("Registro creado exitosamente.")
    cursor.close()

def leer_registros(conexion):
    cursor = conexion.cursor()
    sql = "SELECT * FROM paciente"
    cursor.execute(sql)
    registros = cursor.fetchall()
    for registro in registros:
        print(registro)
    cursor.close()

def actualizar_registro(conexion, ID_Paciente, Nombre, Apellido, Cedula, Sexo, Correo, Telefono, Direccion, Ciudad, Fecha_nacimiento, ID_sangre, Region):
    cursor = conexion.cursor()
    try:
        sql = "UPDATE paciente SET Nombre=%s, Apellido=%s, Cedula=%s, Sexo=%s, Correo=%s, Telefono=%s, Direccion=%s, Ciudad=%s, Fecha_nacimiento=%s, ID_sangre=%s, Region=%s WHERE ID_Paciente=%s"
        valores = (Nombre, Apellido, Cedula, Sexo, Correo, Telefono, Direccion, Ciudad, Fecha_nacimiento, ID_sangre, Region, ID_Paciente)
        cursor.execute(sql, valores)
        conexion.commit()
        print("Registro actualizado exitosamente.")
        cursor.close()
    except mysql.connector.Error as error:
        print(f"Error al actualizar el registro: {error}")
    finally:
        cursor.close()

def eliminar_registro(conexion,id_paciente):
    cursor = conexion.cursor()
    sql = conexion.cursor()
    valores = (id_paciente)
    cursor.execute(sql, valores)
    conexion.commit()
    print("tu datos se han eliminado con exitos")
    cursor.close()
    
conexion = conectar_bd()