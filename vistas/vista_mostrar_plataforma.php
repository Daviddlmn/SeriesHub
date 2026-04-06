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
    pinta_menu($id); ?>
    <main>
        
        <section id="series" class="bs-dark container my-5">
            <div class="row justify-content-evenly">
                <?php
                echo '<a href="../controladores/controlador_modificar_plataforma.php?idPlat=' . $idPlataforma . '" class="my-4 mx-3 text-center"><button class="btn btn-danger my-2">Modificar Plataforma</button></a>';
                if (isset($series) && !is_null($series)) {
                    echo "<h2 class='text-white text-center fs-1 my-4 text-decoration-underline'>Series de  " . $series[0]["nombreLan"] . "</h2>";
                    foreach ($series as $serie) {
                        if (!empty($serie)) {
                            echo
                            '
                                <div class=" col-xxl-3 col-lg-4 col-md-6 ">
                                    <div class="card-danger text-center text-white my-5">
                                        <img src="../series/' . $serie["fotoSerie"] . '" class="img-fluid imgStatic">
                                        <h3 class="fs-2 my-4">' . $serie["nombreSerie"] . '</h3>
                                        <p class="text-center mx-3">' . fechaEspañol($serie["fechaLan"]) . '</p>
                                    </div>
                                </div>';
                        }
                    }
                } else {
                    echo "<h2 class='text-white text-center fs-2 my-4 text-decoration-underline'>No hay series de esta plataforma</h2>";
                }
                echo '<a href="../controladores/controlador_plataforma.php" class="text-center"><button class="btn btn-danger my-2">Volver a plataformas</button></a>';

                ?>
            </div>
        </section>

    </main>


    <?php pintar_footer(); ?>
</body>



</html>