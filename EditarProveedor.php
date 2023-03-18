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
    require('./components/aside.php')
    ?>
    <section class="Content-Section">
        <div class="Page_Seleccion">
            <h3 class="Pagina">Pagina&nbsp</h3>
            <h3 class="Seleccion">/&nbspProveedores</h3>
            <h2 class="Titulo-Pagina">Editar Proveedor</h>
        </div>
        <div class="Contenido">
            <div class="Instrucciones">
                <h1>Edita la Información.</h1>
                <span><i class="fa-solid fa-pen"></i></span>
            </div>
            <div class="Formulario-Imagenes ">
                <?php
                // Conexión a la base de datos
                $Usuario = 'root';
                $Contrasenia = '';
                $Servidor = 'localhost';
                $NombreBD = 'd_and_c';
                $conn = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                // Verificar si se ha enviado un formulario de actualización
                if (isset($_POST['actualizar'])) {
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $direccion = $_POST['direccion'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];

                    // Actualizar el proveedor en la base de datos
                    $sql = "UPDATE proveedores SET nombre='$nombre', direccion='$direccion', correo_electronico='$correo', telefono='$telefono'  WHERE ID_proveedor='$id'";
                    $conn->query($sql);
                }

                // Verificar si se ha enviado un formulario de eliminación

                // Obtener el ID del producto a editar o eliminar
                $id = $_GET['id'];

                // Consulta para seleccionar el producto
                $sql = "SELECT * FROM proveedores WHERE ID_proveedor='$id'";
                $resultado = $conn->query($sql);

                // Verificar si se encontró el producto
                if ($resultado->num_rows > 0) {
                    // Mostrar los detalles del producto en un formulario HTML
                    $info = $resultado->fetch_assoc();
                    echo "<form class='Formulario formulario' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $info["ID_proveedor"] . "'>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar Nombre:</h3>
                            <span><i class='fa-solid fa-dollar-sign'></i></span>
                            <input type='text' class='Precio' name='nombre' value='" . $info["nombre"] . "'>
                            </div>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar la Direccion</h3>
                            <span><i class='fa-solid fa-dollar-sign'></i></span>
                            <input type='text' class='Precio' name='direccion' value='" . $info["direccion"] . "'>
                        </div>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar el Correo Electrinico</h3>
                            <span><i class='fa-solid fa-dollar-sign'></i></span>
                            <input type='text' class='Precio' name='correo' value='" . $info["correo_electronico"] . "'>
                        </div>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar Telefono:</h3>
                            <span><i class='fa-solid fa-dollar-sign'></i></span>
                            <input type='text' class='Precio' name='telefono' value='" . $info["telefono"] . "'>
                            </div>";
                    echo "<div class='Area-Añadir'>
                            <input class='Añadir' type='submit' class='Ocultar' name='actualizar' value='Actualizar Proveedor'>
                        </div>";
                    echo "</form>";
                    echo "<div class='Imagenes'>
                            <img class='previsulizacion' src='https://images.pexels.com/photos/3585095/pexels-photo-3585095.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' alt='Alternate Text' />
                        </div>";
                } else {
                    header("Location: Proveedores.php");
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <script src="./Dom/Aside.js"></script>
</body>

</html>