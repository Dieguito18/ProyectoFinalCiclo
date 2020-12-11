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
        <title>Registrarse</title>
        <meta chartset="UTF-8"/>
        <link rel="stylesheet" href="css/estiloFormularios.css" type="text/css"/>
    </head>
    <body>
        
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
        <form name= "registrarse" action= "model/insertUser.php" method= "post">
            <fieldset class="bordeForm">
                <legend> Registrate </legend>
                <label>Nombre: </label><input type="text" name="nombre" id="nombre" size="15" maxlength="15" required/>
                <br/>
                <label>Apellido: </label><input type="text" name="apellido" id="apellido" size="15" maxlength="15" required/>
                <br/>
                <label>Email: </label><input type="email" name="mail" size="15" maxlength="30" required/>
                <br/>
                <label>Nivel: </label><input type="number" name="nivel" min="1" max="8" step="1" value="3" size="10" required/>
                <br/>
                <label>Contraseña: </label><input type="password" name="contrasena" size="15" maxlength="20" required/>
                <br/>
                <label>Confirma contraseña: </label><input type="password" name="contrasena2" size="15" maxlength="20" required/>
                <br/>
                <label>Sexo: </label><select name="sexo">
                    <option selected="selected">Masculino</option> 
                    <option>Femenino</option>
                </select>
                <br/>
                <input type= "submit" name= "enviar" id="enviar" value= "Registrarse"/>
                <input type= "reset" name= "limpiar" value= "Borrar TODO"/>
            </fieldset>
        </form>
        
    </body>
</html>