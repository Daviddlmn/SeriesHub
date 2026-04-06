
<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataformas.php";
    require_once "../modelos/lanzamiento.php";
    require_once("../php/funciones.php");


    $plat=new plataformas();
    $plataformas=$plat->listarPlataformas();
    // var_dump($plat->listarPlataformas()); 
    
    include "../vistas/vista_plataforma.php";
    ?>
