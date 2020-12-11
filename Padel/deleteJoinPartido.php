<?php
    include 'connect.php';
    $idpartido = $_GET["partido"];
    $idusuario = $_GET["usuario"];
    $sql = "DELETE FROM usuarios_partidos WHERE usuario_idusuarios='$idusuario' and partido_idpartidos='$idpartido'";
    if (mysqli_query($conn, $sql) ){
        $result = $conn ->query("SELECT * from partidos where idpartidos='$idpartido'");
        if($result-> num_rows >0){
            while($row = $result-> fetch_assoc()){
                $numPersonas = $row["numPersonas"];
                if ($numPersonas==4){
                    $numPersonas = $numPersonas-1;
                    $sql = "UPDATE partidos SET numPersonas='$numPersonas', partido='Disponible' WHERE idpartidos='$idpartido'";
                }else{
                    $numPersonas = $numPersonas-1;
                    $sql = "UPDATE partidos SET numPersonas='$numPersonas' WHERE idpartidos='$idpartido'";
                }
            }
        }else{
            echo "0 results";
        }
        if (mysqli_query($conn, $sql) ){
        echo "<script>
            alert('Has salido del partido correctamente!');
            window.location= 'paginaPrincipal.php'
        </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else {
        echo "<script>
        alert('ERROR! No estas unido al partido aun.');
        window.location= 'paginaPrincipal.php'
    </script>";
    }
?>