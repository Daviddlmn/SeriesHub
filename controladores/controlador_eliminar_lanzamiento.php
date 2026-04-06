<?php
require_once "../bd/bd.php";
require_once "../modelos/lanzamiento.php"; 
require_once "../php/funciones.php";

$id=comprueba_usuario();

if ($id==0) {

    $idSerie=$_GET["idSerie"];
    $idPlat=$_GET["idPlat"];

    $objLanz = new lanzamiento();

    $resultadoBorrado = $objLanz->borrarLanzamiento($idSerie ,$idPlat);

    if (!is_null($resultadoBorrado)) {
        echo "<script>alert('El lanzamiento ha sido eliminado correctamente.')</script>";
        echo "<script>location.href='./controlador_lanzamientos.php'</script>";
    } else {
        echo "<script> alert('Error al intentar eliminar el lanzamiento')</script>";
        echo "<script>location.href='./controlador_lanzamientos.php'</script>";
    }
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
?>