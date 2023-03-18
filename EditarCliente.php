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
            <h3 class="Seleccion">/&nbspClientes</h3>
            <h2 class="Titulo-Pagina">Editar Cliente</h>
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
                    $apellidos = $_POST['apellidos'];
                    $correo = $_POST['correo'];

                    // Actualizar el cliente en la base de datos
                    $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', correo_electronico='$correo'  WHERE ID_usuarios='$id'";
                    $conn->query($sql);
                }

                // Verificar si se ha enviado un formulario de eliminación
                if (isset($_POST['eliminar'])) {
                    $id = $_POST['id'];

                    // Eliminar el cliente de la base de datos
                    $sql = "DELETE FROM usuarios WHERE ID_usuarios='$id'";
                    $conn->query($sql);
                }
                // Obtener el ID del producto a editar o eliminar
                $id = $_GET['id'];

                // Consulta para seleccionar el cliente
                $sql = "SELECT * FROM usuarios WHERE ID_usuarios='$id'";
                $resultado = $conn->query($sql);

                // Verificar si se encontró el cliente
                if ($resultado->num_rows > 0) {
                    // Mostrar los detalles del cliente en un formulario HTML
                    $info = $resultado->fetch_assoc();
                    echo "<form class='Formulario formulario' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $info["ID_usuarios"] . "'>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar Nombre:</h3>
                            <span><i class='fa-solid fa-user-large'></i></span>
                            <input type='text' class='Precio' name='nombre' value='" . $info["nombre"] . "'>
                            </div>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar la Direccion</h3>
                            <span><i class='fa-solid fa-people-arrows'></i></span>
                            <input type='text' class='Precio' name='apellidos' value='" . $info["apellidos"] . "'>
                        </div>";
                    echo "<div class='Area-Precio'> 
                            <h3>Cambiar el Correo Electrinico</h3>
                            <span><i class='fa-regular fa-envelope'></i></span>
                            <input type='text' class='Precio' name='correo' value='" . $info["correo_electronico"] . "'>
                        </div>";
                    echo "<div class='Area-Añadir'>
                            <input class='Añadir' type='submit' class='Ocultar' name='actualizar' value='Actualizar cliente'>
                        </div>";
                    echo "<div class='Area-Ocultar-Desocultar'>
                            <div class='Espacio-Ocultar'>
                                <input class='Ocultar' type='submit' name='eliminar' value='Eliminar Cliente'>
                            </div>
                        </div>";
                    echo "</form>";
                    echo "<div class='Imagenes'>
                            <img class='previsulizacion' src='https://images.pexels.com/photos/919453/pexels-photo-919453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' alt='Alternate Text' />
                        </div>";
                } else {
                    header("Location: Clientes.php");
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