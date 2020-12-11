<!DOCTIPE html>
<html lang="es">
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
        <form name= "registrarse" action= "model/editUser.php" method= "post">
            <fieldset class="bordeForm">
                <?php
                    session_start();
                    include 'connect.php';
                    $user = $_SESSION['login_user_sys'];
                    $result = $conn ->query("SELECT * from usuarios WHERE idusuarios='$user'");
                    if($result-> num_rows >0){
                        while($row = $result-> fetch_assoc()){
                            $nombre = $row["nombre"];
                            $apellido = $row["apellido"];
                            $email = $row["email"];
                            $nivel = $row["nivel"];
                            $contrasena = $row["contraseña"];
                        }
                    }
                ?>
                <legend> Edita el Usuario </legend>
                <label>Nombre: </label><input type="text" name="nombre" id="nombre" size="15" maxlength="15" required <?php echo "value='$nombre'"?>/>
                <br/>
                <label>Apellido: </label><input type="text" name="apellido" id="apellido" size="15" maxlength="15" required <?php echo "value='$apellido'"?>/>
                <br/>
                <label>Email: </label><input type="email" name="mail" size="15" maxlength="30" required <?php echo "value='$email'"?>/>
                <br/>
                <label>Nivel: </label><input type="number" name="nivel" min="1" max="8" step="1" <?php echo "value='$nivel'"?> size="10" required/>
                <br/>
                <label>Contraseña: </label><input type="password" name="contrasena" size="15" maxlength="20" required <?php echo "value='$contrasena'"?>/>
                <br/>
                <label>Sexo: </label><select name="sexo">
                    <option selected="selected">Masculino</option> 
                    <option>Femenino</option>
                </select>
                <br/>
                <input type= "submit" name= "enviar" id="enviar" value= "Editar"/>
            </fieldset>
        </form>
        
    </body>
</html>