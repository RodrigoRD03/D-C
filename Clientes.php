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
            <h3 class="Seleccion">/&nbspClientes</h3>
            <h2 class="Titulo-Pagina">Clientes</h>
        </div>
        <div class="Contenido">
            <div class="Area-InstruccionBuscar">
                <div class="Instrucciones Usuarios-Ins">
                    <h1>Lista de Clientes.</h1>
                    <span><i class="fa-solid fa-user-group"></i></span>
                </div>               
            </div>
            <div class="Lista-Usuarios">
                <div class="Usuario-Area">
                    <span class="IconoUsuario"><i class="fa-solid fa-user-large"></i></span>
                    <h1 class="NombreRepartidor">1. Rodriguez Diaz Rodrigo</h1>
                    <form action="./EditarUsuarios.html">
                        <input class="Input-NombreUsuario" type="text" value="RodrigoRodriguezDiaz" name="RodrigoRodriguezDiaz">
                        <button class="Button-InfoUsuario" type="submit"><i class="fa-solid fa-angle-right"></i></button>
                    </form>
                </div>
                <div class="Repartidor-Area">
                    <span class="IconoUsuario"><i class="fa-solid fa-user-large"></i></span>
                    <h1 class="NombreRepartidor">2. Garcia Alvarado Juan Daniel</h1>
                    <form action="./EditarUsuarios.html">
                        <input class="Input-NombreRepartidor" type="text" value="RodrigoRodriguezDiaz" name="RodrigoRodriguezDiaz">
                        <button class="Button-InfoUsuario" type="submit"><i class="fa-solid fa-angle-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="./Dom/Aside.js"></script>
</body>
</html>