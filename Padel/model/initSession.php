<?php
session_start();
include('connect.php');

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
//$email = mysqli_real_escape_string($conn,(strip_tags($email,ENT_QUOTES)));
//$contrasena =  sha1($contrasena);

$sql = "SELECT email, contraseña FROM usuarios WHERE email='$email' AND contraseña='$contrasena'";
$query=mysqli_query($conn,$sql);
$counter=mysqli_num_rows($query);
if ($counter==1){
    $result = $conn ->query("SELECT * from usuarios WHERE email='$email'");
    if($result-> num_rows >0){
        while($row = $result-> fetch_assoc()){
            $id = $row["idusuarios"];
            $_SESSION['login_user_sys']=$id; // Iniciando la sesion
            echo "<script>
                alert('Has iniciado sesión correctamente!');
                window.location= './../usuarioPadel.php'
            </script>";
        }
    }	
} else {
    echo "<script>
            alert('Error al iniciar sesión, el email o la contraseña son erróneos!');
            window.location= './../iniciaSesion.php'
        </script>";
}
?>