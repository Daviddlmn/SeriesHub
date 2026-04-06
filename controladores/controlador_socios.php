<?php
require_once "../bd/bd.php";
require_once("../php/funciones.php");
require_once("../modelos/socios.php");

$id = comprueba_usuario();

$ObjSocios = new socios();

$listaSocios = $ObjSocios->listarSocios();


include "../vistas/vista_socios.php";
