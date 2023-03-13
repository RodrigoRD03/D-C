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
    <section class="Form" >
        <div class="Section-Tittle">
            <i class="fa-solid fa-right-to-bracket"></i>
            <h1>Iniciar Sesión</h1>
        </div>
        <div class="Section-Inputs">
            <form method="POST" class="Formulario">
                <div class="Area-Input_Name">
                    <h3 class="Tittles">Usuario</h3>
                    <i class="fa-solid fa-user Icons"></i>
                    <input type="text" class="input-Text" id="nombre" name="usuario" placeholder="Nombre de Usuario" required />
                </div>
                <div class="Area-Input_password">
                    <h3 class="Tittles">Contraseña</h3>
                    <i class="fa-solid fa-lock Icons"></i>
                    <input type="password" class="input-Password" type="password" name="contraseña" value="" required id="Contraseña" placeholder="Contraseña" />
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="Area-NC">
                    <a class="NC-A" href="./registro.php">¿No tienes cuenta?, Crea una</a>
                </div>
                <div class="Area-Input_Button">
                    <button class="button" type="submit" id="Enviar">
                        Iniciar Sesión
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
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $usuarioE = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

        // Conectarse a la base de datos
        $Usuario = 'root';
        $Contrasenia = '';
        $Servidor = 'localhost';
        $NombreBD = 'd_and_c';
        $conn = new mysqli($Servidor, $Usuario, $Contrasenia, $NombreBD);


        if ($conn->connect_error) {
            die("Error al conectarse a la base de datos: " . $conn->connect_error);
        }

        // Buscar al usuario en la tabla de administradores
        $sql = "SELECT * FROM administradores WHERE nombre_de_usuario='$usuarioE' AND contraseña='$contraseña'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El usuario ha sido encontrado, iniciar sesión
            session_start();
            $_SESSION['usuario'] = $usuario;

            // Redirigir a la página principal
            header("Location: ListaProductos.php");
        } else {
            // El usuario no ha sido encontrado, mostrar mensaje de error
            echo "<script>
                const seccion = document.querySelector('.Formulario');
                seccion.innerHTML += `<p class='Inicio-Fallido'><span><i class='fa-solid fa-xmark'></i></span>Usuario o Contraseña Incorrectos </p>`;
            </script>";
        }

        $conn->close();
    }
    ?>
    <script src="./Dom/DOMLogin.js"></script>
</body>

</html>