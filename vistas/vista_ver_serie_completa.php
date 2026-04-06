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

<main>

    <?php

    foreach ($datosSerie as $valor) {
        // echo '<section id="vermas" class="container text-center">
        //         <div class="col-md-8>
        //             <div class="card">
        //                 <h3 class="text-center fs-1 text-white">'. $valor["nombre"].' </h3>
        //                 <img src="../series/' . $valor["foto"] . '" class="img-fluid">
        //                 <p> '. $valor["descripcion"].'</p>
        //             </div>
        //         </div>
        //     </section>';
        echo '
        <section id="vermas" class="d-flex justify-content-center my-5">
            <div class="card mb-3" style="max-width: 80%;">
                <div class="row g-0">
                    <div class="col-xxl-4">
                        <img src="../series/' . $valor["foto"] . '" class="img-fluid rounded-start" style="min-width: 100%;" >
                    </div>
                    <div class="col-xxl-8 ">
                        <div class="card-body">
                            <h5 class="card-title fs-1 text-center">' . $valor["nombre"] . '</h5>
                            <p class="card-text fs-5">' . $valor["descripcion"] . '</p>
                            <p class="card-text"><small class="text-muted">Disponible en SeriesHub</small></p>
                            <a href="../controladores/controlador_series.php" class="text-align-right"><button class="btn btn-danger ">Volver</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
    }
    ?>
    <?php if ($id != 0  && $id!=-1) { ?>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
                <?php
                if (!empty($datosComentarios)) {
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
                    foreach ($datosComentarios as $comentarios) {
                        echo '
                            <tr class="text-white fst-italic">
                                <td class="fw-bold" style="width: 20%;">' . $comentarios["nombreSerie"] . '</td>
                                <td class="fw-bold" style="width: 20%;">' . $comentarios["nombreSocio"] . '</td>
                                <td class="fw-bold" style="width: 20%;">' . $comentarios["texto"] . '</td>
                                <td class="fw-bold" style="width: 20%;">' . fechaEspañol($comentarios["fecha"]) . '</td>
                                ';
                        if ($comentarios['sociosId'] == $id) {
                            echo '<td><a href="../controladores/controlador_eliminar_comentario.php?seriesId=' . $comentarios["seriesId"] . '&sociosId=' . $comentarios["sociosId"] . '&fecha=' . $comentarios["fecha"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Eliminar</button></a></td>
                            </tr>';
                            $idSerie = $comentarios["seriesId"];
                        } else {
                            echo '<td></td>';
                        }
                    }
                    echo '
                                </tbody>
                            </table>
                        </div>
                    </div>';
                } else {
                    echo "<h2 class='text-white text-center fs-1 my-5'>No hay comentarios</h2>";
                }
                echo '<a href="../controladores/controlador_insertar_comentario.php?seriesId=' . $idSerie . '" class="my-4 mx-3 text-center"><button class="btn btn-danger my-2">Insertar Comentario</button></a></td>
            </tr>';


                ?>
            </div>
        </section>
    <?php } ?>
    <section class="container mt-5">
        <h2 class="fs-1 text-center my-5">Fechas de lanzamiento</h2>
        <div class="row justify-content-center container">
            <?php foreach ($datosFecha as $value) : ?>
                <div class="col-xl-6 mb-4 d-flex justify-content-center">
                    <div class="card w-50">
                        <img src="../plataformas/<?php echo $value["foto"]; ?>" class="card-img-top img-fluid rounded-start ">
                        <div class="card-body">
                            <p class="card-text text-center fs-3">
                                <?php echo fechaEspañol($value["fecha"]); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
</main>
<?php pintar_footer(); ?>

</body>

</html>