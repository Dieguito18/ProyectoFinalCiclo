<?php
    include 'connect.php';
    
    $partido = "Disponible";
    $numPersonas = "0";
    $nivel = $_POST['nivel'];
    $sexo = $_POST["sexo"];
    $horaComienzo = $_POST["horaComienzo"];
    $horaFin = $_POST["horaFin"];
    $fecha = $_POST["fecha"];

    $hoy = date('Y-m-d');
    $sql = "INSERT INTO partidos (partido, numPersonas, nivel, sexo, horaComienzo, horaFin, fecha)
    VALUES ('$partido', '$numPersonas', '$nivel', '$sexo', '$horaComienzo', '$horaFin', '$fecha')";
    if ($fecha>=$hoy){
        if($horaComienzo<$horaFin){
            if($horaComienzo=='??:00'){
                if (mysqli_query($conn, $sql) ){
                    echo "<script>
                        alert('Partido creado correctamente!');
                        window.location= 'paginaPrincipal.php'
                    </script>";
                } else {
                    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo "<script>
                        alert('Error al crear el partido!');
                        window.location= 'crearPartido.php'
                    </script>";
                }
            }else{
                echo "<script>
                    alert('Error al crear el partido, la hora del comienzo no es en punto!');
                    window.location= 'crearPartido.php'
                </script>";
            }
        }else{
            echo "<script>
                alert('Error al crear el partido, las hora de comienzo supera a de terminar!');
                window.location= 'crearPartido.php'
            </script>";
        }
    }else{
        echo "<script>
            alert('Error al crear el partido, la fecha intrducida es antes de hoy!');
            window.location= 'crearPartido.php'
        </script>";
    }
    $conn -> close();
    
?>