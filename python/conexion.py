import mysql.connector

def conectar_bd():
    try:
        conexion = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",  # Reemplaza con tu contraseña
            database="clinica",  # Reemplaza con el nombre de tu base de datos
            port=3306
        )
        print("Conexión exitosa a la base de datos")  # Mensaje de éxito
        return conexion

    except mysql.connector.Error as error:  # Error específico de MySQL
        print("Error al conectar a la base de datos:", error)
        return None

    except Exception as error:  # Error general
        print("Error inesperado:", error)
        return None
 
conexion = conectar_bd()