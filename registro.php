<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://kit.fontawesome.com/a3c9717c3d.js" crossorigin="anonymous"></script>
    <link href="./Styles/Logins.css" rel="stylesheet" />
    <title>Inicio de Sesion</title>
</head>

<body class="grid-Container">

    <section class="Form">
        <div class="Section-Tittle">
            <i class="fa-solid fa-address-book"></i>
            <h1>Registrate</h1>
        </div>
        <div class="Section-Inputs">
            <form method="post" action="registro.php" class="Formulario">
                <div class="Area-Input_Name">
                    <h3 class="Tittles">Nombre</h3>
                    <i class="fa-solid fa-user Icons"></i>
                    <input type="text" class="input-Text" name="nombre" type="text" required id="nombre" placeholder="Nombre" />
                </div>
                <div class="Area-Input_Name">
                    <h3 class="Tittles">Apellidos</h3>
                    <i class="fa-solid fa-user Icons"></i>
                    <input type="text" class="input-Text" name="apellidos" id="apellidos" placeholder="Apelldios" required />
                </div>
                <div class="Area-Input_Name">
                    <h3 class="Tittles">Correo Electronico</h3>
                    <i class="fa-solid fa-envelope Icons"></i>
                    <input type="text" class="input-Text" id="correo" name="correo" placeholder="Correo Electronico" required />
                </div>
                <div class="Area-Input_password">
                    <h3 class="Tittles">Contraseña</h3>
                    <i class="fa-solid fa-lock Icons"></i>
                    <input type="password" class="input-Password" name="contraseña" type="password" value="" required id="Contraseña" placeholder="Contraseña" />
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="Area-NC">
                    <a class="NC-A" href="./index.php">¿Ya tienes cuenta?, Inicia sesión</a>
                </div>
                <div class="Area-Input_Button">
                    <button class="button" type="submit" id="Enviar">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </section>
    <section class="Image">
        <div class="Area-Image">
            <img class="Image-I" src="./media/D&C.png" alt="Alternate Text" />
        </div>
    </section>
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

    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';


    // Validar los datos del formulario (ejemplo básico)
    if (empty($nombre) || empty($apellidos) || empty($correo) || empty($contraseña)) {
    } else {

        // Enviar la consulta SQL para insertar un nuevo registro
        $sql = "INSERT INTO administradores (nombre_de_usuario, correo_electronico, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso!";
            echo "<script>
                const seccion = document.querySelector('.Formulario');
                seccion.innerHTML += `<p class='Registro-Exitoso'>Registro Exitoso <span><i class='fa-solid fa-check'></i></span></p>`;
            </script>";
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    }

    $conn->close();
    ?>
    <script src="./Dom/DOMLogin.js"></script>
</body>

</html>