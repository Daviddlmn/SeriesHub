<?php
require_once "../bd/bd.php";
require_once "../modelos/socios.php";
require_once "../php/funciones.php";

$id = comprueba_usuario();
if (isset($_POST["enviar"]) && $id == 0) {

    $nombre = $_POST["buscar"];
    $objSocio = new socios();
    $resultadosBusqueda = $objSocio->buscarSocio($nombre);

    if ($resultadosBusqueda !== -1) {
        include "../vistas/vista_buscar_socios.php";
    } else {
        echo "<script>alert('No se encontraron resultados.')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
} 

if ($id!=0) {
        echo "<script>alert('No tiene acceso a esta página')</script>";
        echo "<script>location.href='../index.php'</script>";
}

?>