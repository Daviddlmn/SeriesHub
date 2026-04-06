<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeriesHub</title>
    <?php
    bootstrapCSS();
    bootstrapJS();
    require_once "../php/funciones.php";
    ?>
    <link rel="stylesheet" href="../estilo/estilos.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    
</head>

<body>
    <?php $id = comprueba_usuario();
    pinta_menu($id); 
    if ($id!=0){
        echo "<script>alert('No tienes permisos para acceder a este sitio')</script>";
        echo "<script>location.href='../index.php'</script>";
    }?>

    <main>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
                <?php
                // var_dump($resultadosBusqueda);
                
                foreach ($resultadosBusqueda as $clave) {
                    echo '<div class=" col-xxl-3 col-lg-4 col-md-6 ">
                        <div class="card-danger text-center text-white my-5">
                            <img src="../series/' . $clave["foto"] . '" class="img-fluid imgStatic">
                            <h3 class="fs-1 my-4">' . $clave["nombre"] . '</h3>
                            <a href="../controladores/controlador_ver_serie_completa.php?idSerie=' . $clave["id"] . '" class="my-4 mx-3"><button class="btn btn-danger " >Ver más</button></a>
                            <a href="../controladores/controlador_modificar_series.php?idSerie=' . $clave["id"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Modificar Serie</button></a>
                            <a href="../controladores/controlador_desactivar_series.php?idSerie=' . $clave["id"] . '"><button class="btn btn-danger my-2">Desactivar Serie</button></a>
                        </div>
                    </div>';
                }

                echo '                            <a href="../controladores/controlador_series.php" class="text-center"><button class="btn btn-secondary my-2">Volver atrás</button></a>';
                ?>
            </div>
        </section>
    </main>


    <?php pintar_footer(); ?>
</body>



</html>