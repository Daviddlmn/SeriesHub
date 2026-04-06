<?php
require_once "../bd/bd.php";
require_once "../modelos/lanzamiento.php";
require_once "../modelos/series.php";
require_once "../modelos/plataformas.php";
require_once "../php/funciones.php";

$id = comprueba_usuario();
$ObjSeries = new series();
$listaSeries = $ObjSeries->listarSeries();
$ObjPlat = new plataformas();
$listaPlat = $ObjPlat->listarPlataformas();

if (isset($_POST["enviar"]) && $id == 0) {
    $idSerie=$_POST["serie"];
    $idPlat=$_POST["plat"];
    $fecha=$_POST["fecha"];
   
    $ObjLanz = new lanzamiento();
    $insertarLanz = $ObjLanz->insertarLanzamiento($idSerie,$idPlat,$fecha);
    if ($insertarLanz==true) {
        echo "<script>alert('El lanzamiento fue registrado correctamente.')</script>";
        echo "<script>location.href='./controlador_lanzamientos.php'</script>";
    } else {
        echo "<script>alert('Error al intentar registrar el lanzamiento.')</script>";
    }
}
if ($id!=0){
    echo "<script>alert('No tienes permisos para insertar un lanzamiento')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_insertar_lanzamiento.php";
