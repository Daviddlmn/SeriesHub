<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeriesHub</title>
    <?php
    bootstrapCSS();
    bootstrapJS();
    ?>
    <link rel="stylesheet" href="../estilo/estilos.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    
</head>

<body>
    <?php if ($id == 0) { ?>
        <section id="admin" class="container d-flex justify-content-evenly my-5 vh-80">
            <a href="../controladores/controlador_insertar_series.php"><button class="btn btn-danger">Insertar
                    Series</button></a>
            <div>
                <form action="../controladores/controlador_buscar_series.php" method="post">
                    <input type="search" class="btn btn-danger" name="buscar">
                    <input type="submit" name="enviar" class="btn btn-danger" value="Buscar Series">
                </form>
            </div>
        </section>
    <?php } ?>
    <main>
    <section id="series" class="bs-dark container">
        <div class="row justify-content-evenly">
            <?php
            if (isset($datos) && !is_null($datos)) {
                // print_r($datos);
                foreach ($datos as $clave => $valor) {
                    if (!empty($valor)) {
                        echo "<h2 class='text-white text-center fs-2 my-4 text-decoration-underline'>Ultimos lanzamientos de $clave</h2>";
                        echo '<div class="w-100 card-dark text-white d-block text-center"><img src="../plataformas/' . $datos[$clave][0]["logoLan"] . '" class="img-fluid w-25 text-center"></div>';

                        foreach ($valor as $key => $value) {
                            if ($id == 0) {
                                echo
                                    '
                            <div class=" col-xxl-3 col-lg-4 col-md-6 ">
                                <div class="card-danger text-center text-white my-5">
                                    <img src="../series/' . $value["fotoSerie"] . '" class="img-fluid imgStatic">
                                    <h3 class="fs-1 my-4">' . $value["nombreSerie"] . '</h3>
                                    <p class="text-center mx-3">' . fechaEspañol($value["fechaLan"]) . '</p>
                                    <a href="../controladores/controlador_ver_serie_completa.php?idSerie=' . $value["idSerie"] . '" class="my-4 mx-3"><button class="btn btn-danger " >Ver más</button></a>
                                    <a href="../controladores/controlador_modificar_series.php?idSerie=' . $value["idSerie"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Modificar Serie</button></a>
                                    <a href="../controladores/controlador_desactivar_series.php?idSerie=' . $value["idSerie"] . '"><button class="btn btn-danger my-2">Desactivar Serie</button></a>
                                </div>
                            </div>';
                            }else{
                                echo
                                '
                        <div class=" col-xxl-3 col-lg-4 col-md-6 ">
                            <div class="card-danger text-center text-white my-5">
                                <img src="../series/' . $value["fotoSerie"] . '" class="img-fluid imgStatic">
                                <h3 class="fs-1 my-4">' . $value["nombreSerie"] . '</h3>
                                <p class="text-center mx-3">' . fechaEspañol($value["fechaLan"]) . '</p>
                                <a href="../controladores/controlador_ver_serie_completa.php?idSerie=' . $value["idSerie"] . '" class="my-4 mx-3"><button class="btn btn-danger " >Ver más</button></a>
                            </div>
                        </div>';
                            }
                        }
                    } else {
                        echo "<h2 class='text-white text-center fs-2 my-4 text-decoration-underline'>No hay lanzamientos de  $clave</h2>";
                    }
                }
            } else {
                echo "No hay datos disponibles.";
            }

            ?>
        </div>
    </section>
    </main>
    

</body>

</html>