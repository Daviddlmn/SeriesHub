<?php
require_once "../bd/bd.php";
require_once "../modelos/comentarios.php";
require_once "../php/funciones.php";

$id = comprueba_usuario();

if (isset($_POST["enviar"]) && $id != 0) {
    $seriesId=$_GET["seriesId"];
    $socioId=$id;
    $fecha=date("Y-m-d");
    $texto=$_POST["texto"];

    $ObjComen = new comentarios();
    $insertarComen = $ObjComen->insertarComentario($socioId,$seriesId,$fecha,$texto);
    if ($insertarComen==true) {
        echo "<script>alert('El comentario fue registrado correctamente.')</script>";
        echo "<script>location.href='./controlador_series.php'</script>";
    } else {
        echo "<script>alert('No puedes comentar más de una vez.')</script>";
        echo "<script>location.href='./controlador_series.php'</script>";
    }
}
if ($id==0){
    echo "<script>alert('El admin no puede añadir un comentario')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_insertar_comentario.php";
