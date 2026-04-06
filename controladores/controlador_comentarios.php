<?php
require_once "../bd/bd.php";
require_once("../php/funciones.php");
require_once("../modelos/comentarios.php");

$id = comprueba_usuario();
if ($id == 0) {
    $ObjCome = new comentarios();

    $listaComentarios = $ObjCome->listarComentarios();
   
}else{
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}

 include "../vistas/vista_comentarios.php";