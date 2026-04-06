<?php
if (isset($_POST["enviar"])) {
    require_once "../bd/bd.php";
    require_once "../modelos/socios.php";
    require_once "../php/funciones.php";
    if (!$_POST["usuario"] || !$_POST["pass"]) {
        echo "Debes rellenar todos los campos";
        header("Location:../vistas/acceso.php");
        exit;
    } else {
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        if (isset($_POST["recordar"])) {
            $recordar = "si";
        } else {
            $recordar = "no";
        }
        $con = new socios();
        $id=$con->loginSocio($usuario, $pass);
        if ($id != -1) {
            session_start();
            // sesionSocio($id, $recordar);
            $_SESSION["id"] = $id;
            var_dump($_SESSION);
            if ($recordar == "si") {
                $ses = session_encode();
                setcookie("usuario", $ses, time() + (60 * 60 * 24 * 30), "/"); //30 dias;
            }
        }
        header("Location:../index.php");
    }
}