<?php
require_once "../bd/bd.php";
require_once("../php/funciones.php");
require_once("../modelos/lanzamiento.php");

$id = comprueba_usuario();

$ObjLanz = new lanzamiento();

$listaLanz = $ObjLanz->listarLanzamientos();


include "../vistas/vista_lanzamientos.php";
