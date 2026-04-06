
<?php
require_once "../bd/bd.php";
require_once "../modelos/series.php"; 
require_once "../php/funciones.php";
include "../vistas/vista_modificar_series.php";
$id=comprueba_usuario();
if (isset($_POST["enviar"]) && $id==0 && isset($_GET["idSerie"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    if (!file_exists("../series")) {
        mkdir("../series");
    }
    $foto = $_FILES["foto"]["name"];
    $tipo_foto = $_FILES["foto"]["type"];
    $validos=["image/jpeg","image/png","image/gif","image/jpg"];
    if (in_array($tipo_foto, $validos)) {
        move_uploaded_file($_FILES["foto"]["tmp_name"], "../series/$foto");
    } else {
        echo "<script> alert('El formato del archivo no es compatible con la aplicación')</script>";
    }
    $serieObj = new series();
    $resultadoModificacion = $serieObj->modificarSerie($nombre, $descripcion, $foto, $_GET["idSerie"]);

    if ($resultadoModificacion !== -1) {
        echo "<script>alert('La serie fue modificada correctamente')</script>";
        echo "<script>location.href='../controladores/controlador_series.php'</script>";
    } else {
        echo "<script>alert(Error al intentar modificar la serie.')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
}
if ($id!=0){
    echo "<script>alert('No tienes permisos para modificar la serie')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintar_footer();
?>