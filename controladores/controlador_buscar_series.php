<?php
require_once "../bd/bd.php";
require_once "../modelos/series.php";
require_once "../php/funciones.php";

session_start();
$id = $_SESSION["id"];

if (isset($_POST["enviar"]) && $id == 0) {

    $nombre = $_POST["buscar"];
    $serieObj = new series();
    $resultadosBusqueda = $serieObj->buscarSeriePorNombre($nombre);

    if ($resultadosBusqueda !== -1) {
        include "../vistas/vista_buscar_series.php";
    } else {
        echo "<script>alert('No se encontraron resultados.')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
} else {
        echo "<script>alert('No tiene acceso a esta página')</script>";
        echo "<script>location.href='../index.php'</script>";
}
?>