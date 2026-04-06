<?php
require_once "../php/funciones.php";
echo comprueba_usuario();
if (isset($_SESSION["id"])) {
    session_destroy();
    if (isset($_COOKIE["usuario"])) {
        setcookie("usuario","", time() - 100,  "/");
    }
    header("Location: ../index.php");
}else{
    echo "error";
}

