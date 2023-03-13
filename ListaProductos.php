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
            <h2 class="Titulo-Pagina">Productos</h>
        </div>
        <div class="Contenido">
            <div class="Barras">
                <div class="Titulo">
                    <h1>Lista de Productos</h1>
                    <h4>Numero de Productos: 48</h4>
                    <span><i class="fa-solid fa-boxes-stacked"></i></span>
                </div>
                <form action="./AñadirProductos.php">
                    <button class="Agregar-Productos" type="submit">
                        <h1>Agregar Productos</h1>
                        <span><i class="fa-solid fa-plus"></i></span>
                    </button>
                </form>
            </div>
            <div class="Lista-Productos">
                <?php
                // Conectar a la base de datos
                $Usuario = 'root';
                $Contrasenia = '';
                $Servidor = 'localhost';
                $NombreBD = 'd_and_c';
                $conn = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);

                // Verificar si la conexión fue exitosa
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                // Seleccionar todos los productos de la tabla de productos
                $sql = "SELECT * FROM productos";
                $resultado = $conn->query($sql);

                ?>

                
                <?php
                // Mostrar cada producto en una fila de la tabla
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<div class='Producto'>
                                <div class='Imagen-Area'> 
                                    <img class='Imagen-Producto' src='" . $fila['Foto'] ."' alt='". $fila["nombre"] ."' />
                                    <h2>". $fila["nombre"] ."</h2>
                                    <form action='./AñadirProductos.php'>
                                        <button class='Producto-Info'><i class='fa-solid fa-chevron-right'></i></button>
                                    </form>
                                </div>
                            </div>";
                    }
                } else {
                    echo "No hay productos disponibles.";
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
    </section>
    <script src="./Dom/Aside.js"></script>
</body>

</html>