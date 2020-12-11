<?php
    include 'connect.php';
    session_start();
    $user = $_SESSION['login_user_sys'];

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST['mail'];
    $nivel = $_POST['nivel'];
    $contrasena = $_POST["contrasena"];
    $sexo = $_POST["sexo"];
   
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', nivel='$nivel', email='$email', contraseña='$contrasena', sexo='$sexo' WHERE idusuarios='$user'";
    if (mysqli_query($conn, $sql) ){
        echo "<script>
            alert('Usuario editado correctamente!');
            window.location= 'usuarioPadel.php'
        </script>";
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>
            alert('ERROR! No se pudo editar el usuario');
            window.location= 'crearUser.php'
        </script>";
    }
    
    $conn -> close();
    //header('Refresh: 10; Location: iniciaSesion.php');
    
?>