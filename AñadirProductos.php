<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a3c9717c3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Styles/Styles.css">
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
            <h3 class="Seleccion">/&nbspProductos</h3>
            <h2 class="Titulo-Pagina">Añadir Productos</h>
        </div>
        <div class="Contenido">
            <div class="Instrucciones">
                <h1>Complete los campos solicitados.</h1>
                <span><i class="fa-solid fa-pen"></i></span>
            </div>
            <div class="Formulario-Imagenes">
                <form method="post" action="AñadirProductos.php" class="Formulario formulario">
                    <div class="Area-Nombre">
                        <h3>Nombre del Producto</h3>
                        <span><i class="fa-regular fa-comment"></i></span>
                        <input type="Text" class="Nombre" name="nombre" id="TextBox2" required>
                    </div>

                    <div class="Area-Precio">
                        <h3>Precio del Producto</h3>
                        <span><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="Precio" name="precio" required>
                    </div>

                    <div class="Area-Precio">
                        <h3>Numero del Proveedor</h3>
                        <span><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="Precio" name="proveedor" required>
                    </div>

                    <div class="Area-Descripcion">
                        <h3>Agrega una Descripcion:</h3>
                        <textarea class="textarea" name="descripcion" id="descripcion" rows="4" cols="30" required></textarea>
                    </div>

                    <div class="Area-Nombre">
                        <h3>Link de la imagen</h3>
                        <span><i class="fa-regular fa-comment"></i></span>
                        <input type="Text" class="Nombre" name="imagen" required>
                    </div>

                    <div class="Area-Añadir">
                        <button class="Añadir" type="submit" id="Button1">Añadir Producto</button>
                    </div>
                </form>
                <div class="Imagenes">
                    <img class="previsulizacion" src="https://images.pexels.com/photos/996329/pexels-photo-996329.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Alternate Text" />
                </div>
            </div>
        </div>
    </section>
    <?php
    // Conexión a la base de datos

    $Usuario = 'root';
    $Contrasenia = '';
    $Servidor = 'localhost';
    $NombreBD = 'd_and_c';
    $conn = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);

    // Verificar si la conexión es exitosa
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $precio = isset($_POST["precio"]) ? $_POST['precio'] : '';
    $proveedor = isset($_POST["proveedor"]) ? $_POST['proveedor'] : '';
    $descripcion = isset($_POST["descripcion"]) ? $_POST['descripcion'] : '';
    $imagen = isset($_POST["imagen"]) ? $_POST["imagen"] : '';

    // Procesar la imagen
    $precio = floatval($precio);
    // Preparar la consulta SQL para insertar el nuevo producto
    $sql = "INSERT INTO productos (nombre, descripcion, precio, proveedor, Foto) VALUES (?, ?, ?, ?, ?)";
    $consulta = $conn->prepare($sql);

    // Verificar si la consulta preparada es exitosa
    if ($consulta === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    // Vincular los parámetros de la consulta preparada
    $consulta->bind_param("sdsss", $nombre, $descripcion, $precio, $proveedor, $imagen);

    // Ejecutar la consulta
    if ($consulta->execute()) {
        echo "<script>
            const seccion = document.querySelector('.Formulario');
            seccion.innerHTML += `<p class='Registro-Exitoso''><span><i class='fa-solid fa-check'></i></span>Registrado con exito </p>`;
        </script>";
    } 
    // Cerrar la consulta y la conexión
    $consulta->close();
    $conn->close();
    ?>

    <script src="./Dom/Aside.js"></script>
</body>

</html>