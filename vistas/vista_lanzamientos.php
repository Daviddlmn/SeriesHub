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
    <?php if ($id == 0) {
        pinta_menu($id);
    ?>
        <main>
            <section id="admin" class="container d-flex justify-content-evenly my-5 vh-80">
                <div class="">
                    <a href="../controladores/controlador_insertar_lanzamiento.php"><button class="btn btn-danger">Insertar
                            Lanzamiento</button></a>
                </div>
            </section>
        <?php } ?>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
                <?php
                if (isset($listaLanz) && !is_null($listaLanz)) {
                    echo "<h2 class='text-white text-center fs-1 my-5'>Lista de lanzamientos</h2>";
                    echo '<div class="container-danger text-center">
                        <div class="table-responsive">
                            <table border class="table table-striped table-hover text-white">
                                <thead>
                                    <tr class="text-white fs-3">
                                        <th scope="col">Título</th>
                                        <th scope="col">Plataforma</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach ($listaLanz as $lanzamientos) {
                                    foreach ($lanzamientos as $lanzamiento) {
                                        // var_dump($lanzamiento);
                                        echo '
                            <tr class="text-white fs-5 fst-italic">
                                <td class="fw-bold" style="width: 25%;">' . $lanzamiento["nombreSerie"] . '</td>
                                <td class="fw-bold" style="width: 25%;">' . $lanzamiento["nombrePlat"] . '</td>
                                <td class="fw-bold" style="width: 25%;">' . fechaEspañol($lanzamiento["fecha"]) . '</td>
                                <td><a href="../controladores/controlador_modificar_lanzamiento.php?idSerie=' . $lanzamiento["serieId"] . '&idPlat=' . $lanzamiento["platId"].'" class="my-4 mx-3"><button class="btn btn-danger my-2">Modificar</button></a></td>
                                <td><a href="../controladores/controlador_eliminar_lanzamiento.php?idSerie=' . $lanzamiento["serieId"] . '&idPlat=' . $lanzamiento["platId"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Eliminar</button></a></td>
                            </tr>';
                                    }
                                }
                                echo '
                                </tbody>
                            </table>
                        </div>
                    </div>';
                } else {
                    echo "<h2 class='text-white text-center fs-1 my-5'>No hay lanzamientos disponibles</h2>";
                }


                ?>
            </div>

        </section>
        </main>

        <?php pintar_footer(); ?>
</body>

</html>