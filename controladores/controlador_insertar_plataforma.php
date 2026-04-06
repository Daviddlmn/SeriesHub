<?php
require_once "../bd/bd.php";
require_once "../modelos/plataformas.php";
require_once "../php/funciones.php";

session_start();
$id = $_SESSION["id"];
if (isset($_POST["enviar"]) && $id == 0) {
    $nombre = $_POST["nombre"];
    if (!file_exists("../plataformas")) {
        mkdir("../plataformas");
    }
    $foto = $_FILES["foto"]["name"];
    $tipo_foto = $_FILES["foto"]["type"];
    $validos = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
    if (in_array($tipo_foto, $validos)) {
        move_uploaded_file($_FILES["foto"]["tmp_name"], "../plataformas/$foto");
    } else {
        echo "<script> alert('El formato del archivo no es compatible con la aplicación')</script>";
    }
    $plataforma= new plataformas();
    $resultadoInsercion = $plataforma->insertarPlataforma($nombre,$foto);

    if ($resultadoInsercion !== -1) {
        echo "<script>alert('La plataforma fue insertada correctamente.')</script>";
        echo "<script>location.href='./controlador_plataforma.php'</script>";
    } else {
        echo "<script>alert('Error al intentar insertar la plataforma.')</script>";
    }
}
if ($id!=0){
    echo "<script>alert('No tienes permisos para insertar la plataforma')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_insertar_plataforma.php";
