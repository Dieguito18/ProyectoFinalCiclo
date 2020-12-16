<!DOCTIPE html>
<html lang="es">
    <head>
        <title>Partidos Disponibles</title>
        <meta chartset="UTF-8"/>
        <link rel="stylesheet" href="css/estilos.css" type="text/css"/>
        <script src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" charset="utf-8">
        $(window).load(function() {
            $('.flexslider').flexslider({
                touch: true,
                pauseOnAction: false,
                pauseOnHover: false,
            });
        });
        </script>
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
        <section class="contenido" >
            <h1 class="title">Apúntate!</hr></h1>
            <div class= "cajas">
                <p>Inicia sesión o registrate para jugar un Partido. </hr></p>
                
                <button class="botones" type="button" onclick="window.open('iniciaSesion.php', '_self')">Inicia Sesión</button>
                <button class="botones" type="button" onclick="window.open('crearUser.php', '_self')">Regístrate</button>
                <br>
            </div> 

            <h1 class="title">Crea un partido!</hr></h1>
            <div class= "cajas">
                <p>Crea un partido para jugar con tus amigos o con personas que se apunten a jugar contigo.</hr></p>
                
                <button class="botones" type="button" onclick="window.open('crearPartido.php', '_self')">Crear Partido</button>
                <br>
            </div>
            <h1 class="title">Lista de Partidos disponibles</hr></h1>

            <table class="espacio" width="100%"  border="0" align="center" cellspacing="0">
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
                    $hoy = date('Y-m-d');
                    $result = $conn ->query("SELECT * from partidos WHERE partido='Disponible' and fecha>='$hoy' ORDER BY fecha ASC");
                    if($result-> num_rows >0){
                        echo "<tbody>";
                        while($row = $result-> fetch_assoc()){
                            $id = $row["idpartidos"];
                            echo "<tr>
                            <td class=\"text\" align=\"center\" height=\"40\"><a href=\"unirsePartido.php?idpartido=$id\">".$row["partido"]."</a></td>
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
                    $sql = "UPDATE partidos SET partido='No Disponible' WHERE  fecha<'$hoy'";
                    if (mysqli_query($conn, $sql) ){
                    }
                    $conn ->close();
                ?>
            </table>
        </section>
    </body>
</html>