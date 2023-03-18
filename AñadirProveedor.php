<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

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
    $consulta = "INSERT INTO proveedores (nombre, direccion, correo_electronico, telefono) VALUES (?, ?, ?, ?)";

    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("ssss", $nombre, $direccion, $correo, $telefono);
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
            <h3 class="Seleccion">/&nbspProveedor</h3>
            <h2 class="Titulo-Pagina">Añadir Proveedor</h>
        </div>
        <div class="Contenido">
            <div class="Instrucciones">
                <h1>Complete los campos.</h1>
                <span><i class="fa-solid fa-pen"></i></span>
            </div>
            <div class="Formulario-Imagenes">
                <form class="Formulario formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="Area-Input_Nombre">
                        <h3 class="Tittles">Nombre Completo</h3>
                        <i class="fa-solid fa-user user-Icon IconsRR"></i>
                        <input type="text" id="nombre" name="nombre" class="Nombre-Input" required>
                    </div>
                    <div class="Area-Input_Direction">
                        <h3 class="Tittles">Dirección</h3>
                        <i class="fa-solid fa-location-dot IconsRR"></i>
                        <input class="Direccion-Input" type="text" id="direccion" name="direccion" required>
                    </div>
                    <div class="Area-Input_Direction">
                        <h3 class="Tittles">Correo Electronico</h3>
                        <i class="fa-solid fa-calendar IconsRR"></i>
                        <input class="Direccion-Input" type="email" id="correo" name="correo" required>
                    </div>
                    <div class="numbers-Containers">
                        <div class="Area-Input_Telefono">
                            <h3 class="Tittles">Numero Telefonico</h3>
                            <i class="fa-solid fa-phone IconsRR"></i>
                            <input class="Telefono-Input" type="tel" id="telefono" name="telefono" required>
                        </div>
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