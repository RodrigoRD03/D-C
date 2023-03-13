<?php
    class ConexionBD
    {
        public static function Conectar()
        {
            $Usuario = 'root';
            $Contrasenia = '';
            $Servidor = 'localhost';
            $NombreBD = 'd_and_c';
            $conexion = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);
            if ($conexion->connect_error) {
                die("Error al conectarse a la base de datos: " . $conexion->connect_error);
              }
              echo "<p>Conexión exitosa a la base de datos.</p>";
            
            return $conexion;
        }
    }
?>