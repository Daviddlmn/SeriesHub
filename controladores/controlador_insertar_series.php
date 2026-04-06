<?php
require_once "../bd/bd.php";
require_once "../modelos/series.php";
require_once "../php/funciones.php";

session_start();
$id = $_SESSION["id"];
if (isset($_POST["enviar"]) && $id == 0) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    if (!file_exists("../series")) {
        mkdir("../series");
    }
    $foto = $_FILES["foto"]["name"];
    $tipo_foto = $_FILES["foto"]["type"];
    $validos = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
    if (in_array($tipo_foto, $validos)) {
        move_uploaded_file($_FILES["foto"]["tmp_name"], "../series/$foto");
    } else {
        echo "<script> alert('El formato del archivo no es compatible con la aplicación')</script>";
    }
    $serieObj = new series();
    $resultadoInsercion = $serieObj->insertarSerie($nombre, $descripcion, $foto);

    if ($resultadoInsercion !== -1) {
        echo "<script>alert('La serie fue insertada correctamente.')</script>";
        echo "<script>location.href='./controlador_series.php'</script>";
    } else {
        echo "<script>alert('Error al intentar insertar la serie.')</script>";
    }
}
if ($id != 0) {
    echo "<script>alert('No tienes permisos para insertar la serie')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_insertar_series.php";
