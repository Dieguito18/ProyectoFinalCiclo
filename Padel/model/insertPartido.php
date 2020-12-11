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
    
    if ($fecha>=$hoy){
        if($horaComienzo<$horaFin){
            $result = $conn ->query("SELECT * from partidos WHERE  fecha='$fecha'");
            if($result-> num_rows >0){
                while($row = $result-> fetch_assoc()){
                    $horaComienzoQuery = $row["horaComienzo"];
                    $horaFinQuery = $row["horaFin"];
                    if($horaComienzo==$horaComienzoQuery && $horaFinQuery==$horaFin){
                        echo "<script>
                            alert('Error al crear el partido, ya hay un partido creado en las horas seleccionadas!');
                            window.location= './../crearPartido.php'
                        </script>";
                    }else{
                        $sql = "INSERT INTO partidos (partido, numPersonas, nivel, sexo, horaComienzo, horaFin, fecha)
                                VALUES ('$partido', '$numPersonas', '$nivel', '$sexo', '$horaComienzo', '$horaFin', '$fecha')";
                        if (mysqli_query($conn, $sql) ){
                            echo "<script>
                                alert('Partido creado correctamente!');
                                window.location= './../paginaPrincipal.php'
                            </script>";
                        } else {
                            echo "<script>
                                alert('Error al crear el partido!');
                                window.location= './../crearPartido.php'
                            </script>";
                        }
                    }
                }
            }else{
                $sql = "INSERT INTO partidos (partido, numPersonas, nivel, sexo, horaComienzo, horaFin, fecha)
                        VALUES ('$partido', '$numPersonas', '$nivel', '$sexo', '$horaComienzo', '$horaFin', '$fecha')";
                if (mysqli_query($conn, $sql) ){
                    echo "<script>
                        alert('Partido creado correctamente!');
                        window.location= './../paginaPrincipal.php'
                    </script>";
                } else {
                    echo "<script>
                        alert('Error al crear el partido!');
                        window.location= './../crearPartido.php'
                    </script>";
                }
            }
        }else{
            echo "<script>
                alert('Error al crear el partido, la hora de comienzo supera a de terminar!');
                window.location= './../crearPartido.php'
            </script>";
        }
    }else{
        echo "<script>
            alert('Error al crear el partido, la fecha intrducida es anterior a hoy!');
            window.location= './../crearPartido.php'
        </script>";
    }  
                
    $conn -> close();
    
?>