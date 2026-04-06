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
    if ($id != 0) {
        echo "<script>alert('No tienes permisos para acceder a este sitio')</script>";
        echo "<script>location.href='../index.php'</script>";
    } ?>

    <main>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
                <?php
                if (!is_null($resultadosBusqueda)) {
                    foreach ($resultadosBusqueda as $clave) {
                        echo '<div class=" col-xxl-3 col-lg-4 col-md-6 ">
                        <div class="card-danger text-center text-white my-5">
                            <img src="../plataformas/' . $clave["logo"] . '" class="img-fluid">
                            <h3 class="fs-1 my-4">' . $clave["nombre"] . '</h3>
                            <a href="../controladores/controlador_modificar_plataforma.php?idPlat=' . $clave["id"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Modificar Plataforma</button></a>
                        </div>
                    </div>';
                    }
                }else{
                    echo "<h2 class='text-white text-center fs-1 my-5'>No se han encontrado resultados</h2>";
                }

                echo '<a href="../controladores/controlador_plataforma.php" class="text-center"><button class="btn btn-secondary my-2">Volver atrás</button></a>';
                ?>
            </div>
        </section>
    </main>


    <?php pintar_footer(); ?>
</body>



</html>