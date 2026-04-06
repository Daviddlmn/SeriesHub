<?php
require_once "../bd/bd.php";
require_once "../modelos/socios.php";
require_once "../php/funciones.php";
$id = comprueba_usuario();
if (isset($_POST["enviar"]) && $id == 0) {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $pass=$_POST["pass"];
   
    $ObjSocios = new socios();
    $resultadoInsercion = $ObjSocios->insertarSocios($nombre, $usuario, $pass);

    if ($resultadoInsercion !== -1) {
        echo "<script>alert('El socio fue registrado correctamente.')</script>";
        echo "<script>location.href='./controlador_socios.php'</script>";
    } else {
        echo "<script>alert('Error al intentar registrar el socio.')</script>";
    }
}
if ($id!=0){
    echo "<script>alert('No tienes permisos para registrar a un socio')</script>";
    echo "<script>location.href='../index.php'</script>";
}
include "../vistas/vista_insertar_socios.php";
