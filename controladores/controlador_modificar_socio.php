
<?php
require_once "../bd/bd.php";
require_once "../modelos/socios.php";
require_once "../php/funciones.php";

$id = comprueba_usuario();
if (isset($_POST["enviar"]) && $id == 0 && isset($_GET["idSocio"])) {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["pass"];
    $idSocio = $_GET["idSocio"];


    $objSocio = new socios();
    $resultadoModificacion = $objSocio->modificarSocio($nombre, $usuario, $contraseña, $idSocio);

    if ($resultadoModificacion !== -1) {
        echo "<script>alert('El socio fue modificado correctamente')</script>";
        echo "<script>location.href='../controladores/controlador_socios.php'</script>";
    } else {
        echo "<script>alert(Error al intentar modificar el socio.')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
}
if ($id != 0) {
    echo "<script>alert('No tienes permisos para modificar socios')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_modificar_socio.php";
?>