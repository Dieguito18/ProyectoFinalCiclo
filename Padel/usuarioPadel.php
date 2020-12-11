<!DOCTIPE html>
<html lang="es">
<?php
session_start();
if(!isset($_SESSION['login_user_sys'])){
    echo "<script>
            alert('ERROR! No has iniciado sesión.');
            window.location= 'iniciaSesion.php'
        </script>";
    exit;
}
?>
    <head>
        <title>Partidos Disponibles</title>
        <meta chartset="UTF-8"/>
        <link rel="stylesheet" href="css/estilos.css" type="text/css"/>
    </head>
    
    <body>
        <header>
            <section class="wrapper">
                <nav>
                    <ul>
                        <li><a onclick="window.open('paginaPrincipal.php', '_self')">Inicio</a></li>
                        <li><a onclick="window.open('crearPartido.php', '_self')">Crea Partido</a></li>
                        <li><a onclick="window.open('acercaDe.php', '_self')">Información</a></li>
                        <li><a onclick="window.open('iniciaSesion.php', '_self')">Inicia Sesión</a></li>
                        <li><a onclick="window.open('usuarioPadel.php', '_self')">Usuario</a></li>
                    </ul>
                </nav>
            </section>
        </header>
        <section class="contenido">
            <h1>Datos del usuario!</h1>
            <p></hr></p>

            <table width="100%"  border="0" align="center" cellspacing="0">
                <thead>
                    <tr>
                        <td align="center" height="30" bgcolor="#6699FF">Nombre</td>
                        <td align="center" height="30" bgcolor="#6699FF">Apellido</td>
                        <td align="center" height="30" bgcolor="#6699FF">Email</td>
                        <td align="center" height="30" bgcolor="#6699FF">Nivel</td>
                        <td align="center" height="30" bgcolor="#6699FF">Sexo</td>
                    </tr>
            </thead>
            <?php
                include 'connect.php';
                $user=$_SESSION['login_user_sys'];

                $result = $conn ->query("SELECT * from usuarios WHERE idusuarios='$user'");
                if($result-> num_rows >0){
                    echo "<tbody>";
                    while($row = $result-> fetch_assoc()){
                        echo "<tr>
                        <td align=\"center\" height=\"40\">".$row["nombre"]."</a></td>
                        <td align=\"center\" height=\"40\">".$row["apellido"]."</td>
                        <td align=\"center\" height=\"40\">".$row["email"]."</td>
                        <td align=\"center\" height=\"40\">".$row["nivel"]."</td>
                        <td align=\"center\" height=\"40\">".$row["sexo"]."</td>
                        </tr>";
                    }
                    echo "</tbody>";
                }else{
                    echo "0 results";
                }
                $conn ->close();
            ?>
            </table>
        </section>
        <section class="contenido">
            <h1>Partidos unidos!</h1>
            <p></hr></p>
            <table name="users" width="100%"  border="0" align="center" cellspacing="0">
                <thead>
                    <tr>
                        
                        <td align="center" height="30" bgcolor="#6699FF">Partido</td>
                        <td align="center" height="30" bgcolor="#6699FF">Personas</td>
                        <td align="center" height="30" bgcolor="#6699FF">Nivel</td>
                        <td align="center" height="30" bgcolor="#6699FF">Sexo</td>
                        <td align="center" height="30" bgcolor="#6699FF">Hora</td>
                        <td align="center" height="30" bgcolor="#6699FF">Fecha</td>
                    </tr>
                </thead>
                <?php
                include 'connect.php';
                $user=$_SESSION['login_user_sys'];
                $result = $conn ->query("SELECT * from partidos  
                join usuarios_partidos on usuarios_partidos.partido_idpartidos = partidos.idpartidos
                join usuarios on usuarios.idusuarios = usuarios_partidos.usuario_idusuarios
                where idusuarios = '$user'");
                if($result-> num_rows >0){
                    echo "<tbody>";
                    while($row = $result-> fetch_assoc()){
                        $id = $row["idpartidos"];
                        echo "<tr>
                        <td align=\"center\" height=\"40\"><a href=\"datosPartido.php?idpartido=$id\">".$row["partido"]."</a></td>
                        <td align=\"center\" height=\"40\">".$row["numPersonas"]."</td>
                        <td align=\"center\" height=\"40\">".$row["nivel"]."</td>
                        <td align=\"center\" height=\"40\">".$row["sexo"]."</td>
                        <td align=\"center\" height=\"40\">".$row["horaComienzo"]." a ".$row["horaFin"]."</td>
                        <td align=\"center\" height=\"40\">".$row["fecha"]."</td>
                        </tr>";
                    }
                    echo "</tbody>";
                }else{
                    echo "0 results";
                }
                $conn ->close();
                ?>
            </table>
            <p></hr></p>
            <button class="botones" type="button" onclick="window.open('cerrarSesion.php', '_self')">Cerrar sesión</button>
            <button class="botones" type="button" onclick="window.open('editarUser.php', '_self')">Editar Usuario</button>
            <button class="botones" type="button" onclick="window.open('deleteUser.php', '_self')">Borrar Usuario</button>
        </section>
    </body>
</html>