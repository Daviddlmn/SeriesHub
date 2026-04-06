<?php
require_once "../bd/bd.php";
require_once "../modelos/socios.php"; 
require_once "../php/funciones.php";

$id=comprueba_usuario();
if ($id==0) {
   
    $idSocio=$_GET["idSocio"];

    // Instancia de la clase series y ejecuta la función para desactivar
    $ObjSocios = new socios();
    $resultadoDesactivacion = $ObjSocios->desactivarSocio($idSocio);

    if ($resultadoDesactivacion !== -1) {
        echo "<script>alert('El socio fue desactivado correctamente.')</script>";
        echo "<script>location.href='./controlador_socios.php'</script>";
    } else {
        echo "<script>alert('Error al intentar desactivar al socio')</script>";
        echo "<script>location.href='./controlador_socios.php'</script>";
    }
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
?>