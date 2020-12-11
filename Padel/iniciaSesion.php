<!DOCTIPE html>
<html lang="es">
<?php
session_start();
if(isset($_SESSION['login_user_sys'])){
    echo "<script>
            alert('Ya has iniciado sesión!');
            window.location= 'paginaPrincipal.php'
        </script>";
    exit;
}
?>
    <head>
        <title>Iniciar sesion</title>
        <meta chartset="UTF-8"/>
		<link rel="stylesheet" href="css/estiloFormularios.css" type="text/css"/>
    </head>
    <body>
        <h1></h1>
        <header>
            <section class="wrapper">
                <nav>
                    <ul>
                        <li><a onclick="window.open('paginaPrincipal.php', '_self')">Inicio</a></li>
                        <li><a onclick="window.open('informacionPadel.php', '_self')">Información</a></li>
                        <li><a onclick="window.open('crearPartido.php', '_self')">Crea Partido</a></li>
                        <li><a onclick="window.open('usuarioPadel.php', '_self')">Usuario</a></li>
                        <li><a onclick="window.open('iniciaSesion.php', '_self')">Inicia Sesión</a></li>
                    </ul>
                </nav>
            </section>
        </header>
        <p class="espacio"></p>
        <form name= "inicia sesion" action= "model/initSession.php" method= "post">
            <fieldset class="bordeForm">
                <legend> Inicia sesión </legend>
                <label>Email: </label><input type= "email" name= "email" size= "15" maxlength= "30" required/> 
                <br/>
                <label>Contraseña: </label><input type= "password" name= "contrasena" size= "15" maxlength= "20" required/> 
                <br/>
                
                <input type= "submit" name= "enviar" value= "Iniciar sesión"/>
                <button class="botones" type="button" onclick="window.open('crearUser.php', '_self')">Registrarse</button>
            </fieldset>
        </form>
        
    </body>
</html>