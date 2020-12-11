<?php
session_start();
if(session_destroy()) {
    echo "<script>
            alert('Has cerrado tu sesión correctamente!');
            window.location= './../paginaPrincipal.php'
        </script>";
}
?>
