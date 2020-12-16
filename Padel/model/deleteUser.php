<?php
    include 'connect.php';
    session_start();
    $user = $_SESSION['login_user_sys'];

    $sql = "DELETE FROM usuarios WHERE idusuarios='$user'";
    if (mysqli_query($conn, $sql) ){
        $sql = "DELETE FROM usuarios_partidos WHERE usuario_idusuarios='$idusuario'";
        if (mysqli_query($conn, $sql) ){
            if(session_destroy()) {
                echo "<script>
                        alert('Usuario borrado correctamente!');
                        window.location= './../paginaPrincipal.php'
                    </script>";
            }
        }else{
            echo "<script>
                alert('Error al borrar el usuario!');
                window.location= './../usuarioPadel.php'
            </script>";
        }
    }else{
        echo "<script>
            alert('Error al borrar el usuario!');
            window.location= './../usuarioPadel.php'
        </script>";
    }
?>