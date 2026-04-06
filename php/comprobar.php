<?php


require_once "../modelos/comentarios.php";
$conexion = new comentarios();
var_dump($conexion->ultimosCincoComentarios());
?>



<!-- hay que hacer el la funcion comentarios con el carrusel -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../estilo/estilos.css" rel="stylesheet">
    <title>Document</title>


</head>

<body>
    <?php   include "../modelos/"; ?>
</body>

</html>