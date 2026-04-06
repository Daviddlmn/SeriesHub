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
    }
    ?>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
                <?php
                if (isset($listaComentarios) && !is_null($listaComentarios)) {
                    echo "<h2 class='text-white text-center fs-1 my-5'>Lista de comentarios</h2>";
                    echo '<div class="container-danger text-center">
                        <div class="table-responsive">
                            <table border class="table table-striped table-hover text-white">
                                <thead>
                                    <tr class="text-white fs-3">
                                        <th scope="col">Serie</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach ($listaComentarios as $comentarios) {
                                        echo '
                            <tr class="text-white fst-italic">
                                <td class="fw-bold" style="width: 20%;">' . $comentarios["nombreSerie"] . '</td>
                                <td class="fw-bold" style="width: 20%;">' . $comentarios["nombreSocio"] . '</td>
                                <td class="fw-bold" style="width: 20%;">' . $comentarios["texto"] . '</td>
                                <td class="fw-bold" style="width: 20%;">' . fechaEspañol($comentarios["fecha"]) . '</td>
                                <td><a href="../controladores/controlador_eliminar_comentario.php?seriesId=' . $comentarios["seriesId"] . '&sociosId=' . $comentarios["sociosId"] . '&fecha='.$comentarios["fecha"].'" class="my-4 mx-3"><button class="btn btn-danger my-2">Eliminar</button></a></td>
                            </tr>';
                                    
                                }
                                echo '
                                </tbody>
                            </table>
                        </div>
                    </div>';
                } else {
                    echo "<h2 class='text-white text-center fs-1 my-5'>No hay comentarios</h2>";
                }


                ?>
            </div>

        </section>
        </main>

        <?php pintar_footer(); ?>
</body>

</html>