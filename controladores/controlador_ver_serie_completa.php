<?php 
require_once "../php/funciones.php";
require_once "../modelos/series.php";
require_once "../modelos/lanzamiento.php";
require_once "../modelos/comentarios.php";
$id = comprueba_usuario();
pinta_menu($id);





$idSerie = $_GET["idSerie"];
echo $idSerie;



$objSerie = new series();
$objLanz = new lanzamiento();
$objComen= new comentarios();

$datosSerie = $objSerie->buscarSeriePorId($idSerie);
$datosFecha = $objLanz->buscarLanzamientoPorSerie($idSerie);
$datosComentarios=$objComen->buscarComentarioPorSerie($idSerie);

include "../vistas/vista_ver_serie_completa.php";

?>
