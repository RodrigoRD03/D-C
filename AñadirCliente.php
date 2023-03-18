<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    require("./conexion.php");
    
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    // Configuración de la conexión a la base de datos
    $Usuario = 'root';
    $Contrasenia = '';
    $Servidor = 'localhost';
    $NombreBD = 'd_and_c';
    $conexion = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);

    // Verificar la conexión
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta para insertar el proveedor en la base de datos
    $consulta = "INSERT INTO usuarios (nombre, apellidos, correo_electronico, contraseña) VALUES (?, ?, ?, ?)";

    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("ssss", $nombre, $apellidos, $correo, $contraseña);
    $stmt->execute();

    // Ejecutar la consulta


    // Cerrar la conexión a la base de datos
    $conexion->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a3c9717c3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Styles/Style.css">
    <title>Administrador</title>
</head>

<body>
    <div class="Desplegar-Aside">
        <span><i class="fa-solid fa-chevron-right"></i></span>
    </div>
    <?php
    require("./components/aside.php")
    ?>
    <section class="Content-Section">
        <div class="Page_Seleccion">
            <h3 class="Pagina">Pagina&nbsp</h3>
            <h3 class="Seleccion">/&nbspClientes</h3>
            <h2 class="Titulo-Pagina">Añadir Clientes</h>
        </div>
        <div class="Contenido">
            <div class="Instrucciones">
                <h1>Complete los campos.</h1>
                <span><i class="fa-solid fa-pen"></i></span>
            </div>
            <div class="Formulario-Imagenes">
                <form class="Formulario formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="Area-Input_Nombre">
                        <h3 class="Tittles">Nombre</h3>
                        <i class="fa-solid fa-user user-Icon IconsRR"></i>
                        <input type="text" id="nombre" name="nombre" class="Nombre-Input" required>
                    </div>
                    <div class="Area-Input_Nombre">
                        <h3 class="Tittles">Apellidos</h3>
                        <i class="fa-solid fa-user user-Icon IconsRR"></i>
                        <input type="text" class="Nombre-Input" id="apelldios" name="apellidos" required>
                    </div>
                    <div class="Area-Input_Direction">
                        <h3 class="Tittles">Correo Electronico</h3>
                        <i class="fa-solid fa-calendar IconsRR"></i>
                        <input class="Direccion-Input" type="email" id="correo" name="correo" required>
                    </div>
                    <div class="Area-Input_password">
                        <h3 class="Tittles">Contraseña</h3>
                        <i class="fa-solid fa-lock Icons IconsRR""></i>
                        <input type=" password" class="input-Password" type="password"" name=" contraseña" value="" required id="Contraseña" />
                        <i class="fa-solid fa-eye eye"></i>
                    </div>
                    <div class="Area-Input_Button">
                        <button class="button" type="submit">Registrar</button>
                    </div>
                </form>
                <div class="Imagenes">
                    <div class="Imagen-Repartidor">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./Dom/Aside.js"></script>
    <script src="./Dom/DOMLogin.js"></script>
</body>

</html>