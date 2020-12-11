<?php
    include 'connect.php';
    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["mail"];
    $nivel = $_POST['nivel'];
    $contrasena = $_POST["contrasena"];
    $contrasena2 = $_POST["contrasena2"];
    $sexo = $_POST["sexo"];

    if ($contrasena == $contrasena2){
        
        $sql = "INSERT INTO usuarios (nombre, apellido, email, nivel, contraseña, sexo) 
        VALUES ('$nombre', '$apellido','$email', '$nivel', '$contrasena', '$sexo')";
        if (mysqli_query($conn, $sql) ){
            echo "<script>
                alert('Usuario creado correctamente!');
                window.location= 'iniciaSesion.php'
            </script>";
        } else {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script>
            alert('ERROR! El email ya esta en uso');
            window.location= 'crearUser.php'
        </script>";
        }
    } else {
        //echo "Las contraseñas no son iguales";
        echo "<script>
            alert('ERROR! Las contraseñas no son iguales');
            window.location= 'crearUser.php'
        </script>";
    }
    $conn -> close();
    //header('Refresh: 10; Location: iniciaSesion.php');
    
?>