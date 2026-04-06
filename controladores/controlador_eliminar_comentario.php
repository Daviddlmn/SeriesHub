<?php
require_once "../bd/bd.php";
require_once "../modelos/comentarios.php"; 
require_once "../php/funciones.php";

$id=comprueba_usuario();

$sociosId=$_GET["sociosId"];
$seriesId=$_GET["seriesId"];
$fecha=$_GET["fecha"];

if ($id==0) {


    $objLanz = new comentarios();

    $resultadoBorrado = $objLanz->borrarComentario($sociosId,$seriesId,$fecha);

    if ($resultadoBorrado==true) {
        echo "<script>alert('El comentario  ha sido eliminado correctamente.')</script>";
        echo "<script>location.href='./controlador_comentarios.php'</script>";
    } else {
        echo "<script> alert('Error al intentar eliminar el comentario')</script>";
        echo "<script>location.href='./controlador_comentarios.php'</script>";
    }
} elseif ($sociosId==$id){

    $objLanz = new comentarios();

    $resultadoBorrado = $objLanz->borrarComentario($sociosId,$seriesId,$fecha);

    if ($resultadoBorrado==true) {
        echo "<script>alert('El comentario  ha sido eliminado correctamente.')</script>";
        echo "<script>location.href='./controlador_series.php'</script>";
    } else {
        echo "<script> alert('Error al intentar eliminar el comentario')</script>";
        echo "<script>location.href='./controlador_series.php'</script>";
    }

}else{
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
?>