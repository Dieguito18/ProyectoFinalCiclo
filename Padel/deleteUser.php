<?php
    include 'connect.php';
    session_start();
    $user = $_SESSION['login_user_sys'];

    $sql = "DELETE FROM usuarios WHERE email='$user'";
    if (mysqli_query($conn, $sql) ){
        if(session_destroy()) {
            echo "<script>
                    alert('Usuario borrado correctamente!');
                    window.location= 'paginaPrincipal.php'
                </script>";
        }
    }else{
        echo "<script>
            alert('ERROR! no se ha podido borrar el usuario');
            window.location= 'usuarioPadel.php'
        </script>";
    }
?>