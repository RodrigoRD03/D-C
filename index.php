<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://kit.fontawesome.com/a3c9717c3d.js" crossorigin="anonymous"></script>
    <link href="./Styles/Login.css" rel="stylesheet" />
    <title>Inicio de Sesion</title>
</head>

<body class="grid-Container">
    <section class="Form">
        <div class="Section-Tittle">
            <i class="fa-solid fa-right-to-bracket"></i>
            <h1>Iniciar Sesión</h1>
        </div>
        <div class="Section-Inputs">
            <form id="form1" runat="server">
                <div class="Area-Input_Name">
                    <h3 class="Tittles">Usuario</h3>
                    <i class="fa-solid fa-user Icons"></i>
                    <input type="text" class="input-Text" type="text" value="" required id="NombreUsuario" placeholder="Nombre de Usuario" />
                </div>
                <div class="Area-Input_password">
                    <h3 class="Tittles">Contraseña</h3>
                    <i class="fa-solid fa-lock Icons"></i>
                    <input type="password" class="input-Password" type="password" value="" required id="Contraseña" placeholder="Contraseña" />
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

    <script src="./Dom/DOMLogin.js"></script>
</body>

</html>