<?php
require_once "../bd/bd.php";
require_once "../modelos/series.php"; 
require_once "../php/funciones.php";

$id=comprueba_usuario();
if ($id==0) {
   
    $idSerie=$_GET["idSerie"];

    // Instancia de la clase series y ejecuta la función para desactivar
    $serieObj = new series();
    $resultadoDesactivacion = $serieObj->desactivarSerie($idSerie);

    if ($resultadoDesactivacion !== -1) {
        echo "<script>alert('La serie fue desactivada correctamente.')</script>";
        echo "<script>location.href='./controlador_series.php'</script>";
    } else {
        echo "<script>alert('Error al intentar desactivar la serie')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
?>