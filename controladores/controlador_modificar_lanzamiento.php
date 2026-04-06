
<?php
require_once "../bd/bd.php";
require_once "../modelos/lanzamiento.php";
require_once "../php/funciones.php";

$id = comprueba_usuario();

if (isset($_POST["enviar"]) && $id == 0 && isset($_GET["idSerie"]) && isset($_GET["idPlat"])) {
    $idSerie=$_GET["idSerie"];
    $idPlat=$_GET["idPlat"];
    $fecha=$_POST["fecha"];
    $objPlat = new lanzamiento();
    $resultadoModificacion = $objPlat->modificarLanzamiento($idSerie,$idPlat,$fecha);

    if ($resultadoModificacion !== -1) {
        echo "<script>alert('La fecha de la plataforma ha sido modificada correctamente')</script>";
        echo "<script>location.href='../controladores/controlador_lanzamientos.php'</script>";
    } else {
        echo "<script>alert('Error a intentar a modificar la fecha')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
}
if ($id != 0) {
    echo "<script>alert('No tienes permisos para modificar ninguna plataforma')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_modificar_lanzamiento.php";
?>