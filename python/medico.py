from flask import Flask, render_template
from conexion import conectar_bd # importa la funcion de conexion de tu archivo conexion.py
import mysql.connector

app = Flask(__name__)

def leer_registros():
    """conecta a la BD, lee todos los pacientes y devuelve una lista de tuplas."""
    conexion = conectar_bd() # llama a tu funcion de conexion
    resultados = []
    
    if conexion is None:
        print("error: no se pudo establecer la conexion a la base de datos")
        return resultados
    
    cursor = None
    try:
        # aqui se usa el cursor para ejecutar la consulta
        cursor = conexion.cursor()
        cursor.execute("SELECT * FROM medico")
        resultados = cursor.fetchall()
        
    except mysql.connector.Error as error:
        print(f"error al leer los datos en sistema: {error}")
        
    finally:
        if cursor is not None:
            cursor.close()
        if conexion.is_connected():
            conexion.close() # Cierra la conexion despues de la operacion 
    
    return resultados

# --- ruta principal de flask (renderizado) ---
@app.route("/")

def listar_medico():
    # 1. obtener datos de la base datos
    datos_medico = leer_registros()
    
    # 2. renderizar la plantilla html, pasandole los datos
    return render_template(
        "medico.html",
        medico=datos_medico,
        titulo="lista de médicos"
    )
# --- Inicio del servidor
if __name__ == "__main__":
    # asegurate de que tu servidor mysql (xampp/wamp) este corriendo.
    app.run(debug=True)
    