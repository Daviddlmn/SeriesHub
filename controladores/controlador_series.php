<?php
require_once "../bd/bd.php";
require_once "../modelos/plataformas.php";
require_once "../modelos/lanzamiento.php";
require_once("../php/funciones.php");

$id = comprueba_usuario();
pinta_menu($id);

$plat = new plataformas();
$plat->listarPlataformas();
$lanz = new lanzamiento();
// var_dump($plat->listarPlataformas()); 
foreach ($plat->listarPlataformas() as $clave => $valor) {
    // echo $plat->listarPlataformas()[$clave]["nombre"];
    $datos[$plat->listarPlataformas()[$clave]["nombre"]] = $lanz->buscarLanzamientoPorPlataforma
    ($plat->listarPlataformas()[$clave]["id"]);
    // “Buscar lanzamiento por plataforma”
}
include "../vistas/mostrar_series.php";

pintar_footer();
?>