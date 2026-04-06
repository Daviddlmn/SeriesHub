
<?php
    require_once "../bd/bd.php";
    require_once "../modelos/lanzamiento.php";
    require_once("../php/funciones.php");

    $idPlataforma=$_GET["idPlat"];
    $lanz=new lanzamiento();
    $series=$lanz->buscarLanzamientoPorPlataforma($idPlataforma);
    // var_dump($plat->listarPlataformas()); 
    
    include "../vistas/vista_mostrar_plataforma.php";


    ?>
