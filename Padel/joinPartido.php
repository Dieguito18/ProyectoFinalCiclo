<?php
    include 'connect.php';
    $idpartido = $_GET["partido"];
    $idusuario = $_GET["usuario"];
    $sql = "INSERT INTO usuarios_partidos (usuario_idusuarios, partido_idpartidos)
            VALUES ('$idusuario', '$idpartido')";
    if (mysqli_query($conn, $sql) ){
        $result = $conn ->query("SELECT * from partidos where idpartidos='$idpartido'");
        if($result-> num_rows >0){
            while($row = $result-> fetch_assoc()){
                $numPersonas = $row["numPersonas"];
                if ($numPersonas<4){
                    $numPersonas = $numPersonas+1;
                    if ($numPersonas==4){
                        $sql = "UPDATE partidos SET numPersonas='$numPersonas', partido='No Disponible' WHERE idpartidos='$idpartido'";
                    }else{
                        $sql = "UPDATE partidos SET numPersonas='$numPersonas' WHERE idpartidos='$idpartido'";
                    }
                }else {
                    echo "<script>
                    alert('ERROR! Ya hay 4 jugadores que se han unido.');
                    window.location= 'paginaPrincipal.php'
                </script>";
                }
            }
        }else{
            echo "0 results";
        }
        if (mysqli_query($conn, $sql) ){
        echo "<script>
            alert('Te has unido correctamente!');
            window.location= 'paginaPrincipal.php'
        </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }   
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>
        alert('ERROR! Ya te has unido a este partido.');
        window.location= 'paginaPrincipal.php'
    </script>";
    }
?>