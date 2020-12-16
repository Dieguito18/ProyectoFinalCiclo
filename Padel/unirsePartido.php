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
        <title>Partido</title>
        <meta chartset="UTF-8"/>
        <link rel="stylesheet" href="css/estilos.css" type="text/css"/>
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
        <section class="contenido">
            <h1>Datos del partido!</h1>
            <p></hr></p>
            <table width="100%"  border="0" align="center" cellspacing="0">
                <thead>
                    <tr>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Partido</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Personas</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Nivel</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Sexo</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Hora</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Fecha</td>
                    </tr>
            </thead>
            <?php
                include 'connect.php';
                $idpartido = $_GET["idpartido"];
                $result = $conn ->query("SELECT * from partidos where idpartidos = '$idpartido' ");
                if($result-> num_rows >0){
                    echo "<tbody>";
                    while($row = $result-> fetch_assoc()){
                        echo "<tr>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["partido"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["numPersonas"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["nivel"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["sexo"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["horaComienzo"]." a ".$row["horaFin"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["fecha"]."</td>
                        </tr>";
                    }
                    echo "</tbody>";
                }else{
                    echo "";
                }
                $conn ->close();
            ?>
            </table>
        </section>
        <section class="contenido">
            <h1>Personas unidas!</h1>
            <p></hr></p>
            <table class="espacio" name="users" width="100%"  border="0" align="center" cellspacing="0">
                <thead>
                    <tr>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Nombre</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Apellido</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Nivel</td>
                        <td class="text" align="center" height="30" bgcolor="#6699FF">Sexo</td>
                    </tr>
                </thead>
                <?php
                include 'connect.php';
                $result = $conn ->query("SELECT * from usuarios 
                join usuarios_partidos on usuarios.idusuarios = usuarios_partidos.usuario_idusuarios 
                where partido_idpartidos = '$idpartido'");
                if($result-> num_rows >0){
                    echo "<tbody>";
                    while($row = $result-> fetch_assoc()){
                        echo "<tr>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["nombre"]."</a></td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["apellido"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["nivel"]."</td>
                        <td class=\"text\" align=\"center\" height=\"40\">".$row["sexo"]."</td>
                        </tr>";
                    }
                    echo "</tbody>";
                }else{
                    echo "";
                }
                $conn ->close();
                ?>
            </table>
            <p></hr></p>
            <?php
            include 'connect.php';
            $user = $_SESSION['login_user_sys'];
            echo "<a class=\"botones\" href=\"model/joinPartido.php?partido=$idpartido&usuario=$user\">Únete al partido</a>";
            echo "<a class=\"botones\" href=\"model/deleteJoinPartido.php?partido=$idpartido&usuario=$user\">Salir del partido</a>";
            ?>
        </section>
    </body>
</html>