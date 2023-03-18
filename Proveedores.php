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
            <h2 class="Titulo-Pagina">Proveedores</h>
        </div>
        <div class="Contenido">
            <div class="Area-InstruccionBuscar">
                <div class="Instrucciones Repartidores-Ins">
                    <h1>Lista de los Proveedores.</h1>
                    <span><i class="fa-solid fa-people-carry-box"></i></span>
                </div>
                <form action="./AñadirProveedor.php">
                    <button class="Agregar-Productos" type="submit">
                        <h1>Agregar Proveedor</h1>
                        <span><i class="fa-solid fa-plus"></i></span>
                    </button>
                </form>
            </div>
            <div class="Lista-Repartidores">
                <?php
                $Usuario = 'root';
                $Contrasenia = '';
                $Servidor = 'localhost';
                $NombreBD = 'd_and_c';
                $conn = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                // Consulta para seleccionar todos los proveedores
                $sql = "SELECT * FROM proveedores";
                $resultado = $conn->query($sql);

                // Verificar si hay resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar los resultados en una tabla HTML
                    while ($info = $resultado->fetch_assoc()) {
                        echo "<div class='Repartidor-Area'> 
                                <span class='IconoPersona'><i class='fa-regular fa-circle-user'></i></span>
                                <h1 class='NombreRepartidor'>" . $info["nombre"] . "</h1>
                                <form action='./EditarProveedor.php'>
                                    <input class='Input-NombreRepartidor' type='number' name='id' value='" .  $info["ID_proveedor"] . "'>
                                    <button class='Button-InfoUsuario' type='submit'><i class='fa-solid fa-angle-right'></i></button>
                                </form>
                        </div>";
                    }
                } else {
                    echo "No se encontraron resultados.";
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