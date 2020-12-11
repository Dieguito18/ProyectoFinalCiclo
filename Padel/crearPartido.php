<!DOCTIPE html>
<html lang="es">
<?php
session_start();
if(!isset($_SESSION['login_user_sys'])){
    echo "<script>
            alert('Inicia sesión para acceder a esta página!');
            window.location= 'iniciaSesion.php'
        </script>";
    exit;
}
?>
    <head>
        <title>Crea un partido</title>
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
        <form name= "inicia sesion" action= "model/insertPartido.php" method= "post">
            <fieldset class="bordeForm">
                <legend> Crear partido </legend>
                <label>Fecha: </label><input type="date" name="fecha" required/>
                <br/>
                <label>Hora:  De: </label><input type="time" name="horaComienzo" required/>
                <br>
                <label>A: </label><input type="time" name="horaFin" required/>
                <br/>
                <label>Nivel: </label><input type="number" name="nivel" min="1" max="8" step="1" value="3" size="10" required/>
                <br/>
                <label>Sexo: </label><select name="sexo">
                    <option selected="selected">Masculino</option> 
                    <option>Femenino</option>
                    <option>Mixto</option>
                </select>
                <br/>
                
                <input type= "submit" name= "enviar" value= "Crear partido"/>
                <input type= "reset" name= "limpiar" value= "Borrar TODO"/>
            </fieldset>
        </form>
          
    </body>
</html>