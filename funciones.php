<?php

function obtener_numero_productos()
{
    // Configuración de la conexión a la base de datos
    $Usuario = 'root';
    $Contrasenia = '';
    $Servidor = 'localhost';
    $NombreBD = 'd_and_c';
    $conexion = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta para obtener el número de productos
    $consulta = "SELECT COUNT(*) AS total FROM productos";
    $resultado = $conexion->query($consulta);

    // Verificar si se encontraron productos
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $numero_productos = $fila["total"];
    } else {
        $numero_productos = 0;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();

    // Devolver el número de productos
    return $numero_productos;
}
