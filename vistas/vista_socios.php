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
    <?php if ($id == 0) {
        pinta_menu($id);
    ?>
        <main>
            <section id="admin" class="container d-flex justify-content-evenly my-5 vh-80">
                <div class="">
                    <a href="../controladores/controlador_insertar_socios.php"><button class="btn btn-danger">Insertar
                            Socios</button></a>
                </div>
                <div>
                    <form action="../controladores/controlador_buscar_socios.php" method="post">
                        <input type="search" class="btn btn-danger" name="buscar">
                        <input type="submit" name="enviar" class="btn btn-danger" value="Buscar Socios">
                    </form>
                </div>
            </section>
        <?php } ?>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
                <?php
                if (isset($listaSocios) && !is_null($listaSocios)) {

                    echo "<h2 class='text-white text-center fs-1 my-5'>Lista de socios</h2>";
                    echo '<div class="container-danger  text-center">
                            <table border class="table table-striped table-hover text-white">';
                    echo '
                                <tr class="text-white fs-3">
                                    <td>Nombre</td>
                                    <td>Usuario</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        ';
                    foreach ($listaSocios as $valor) {
                        // var_dump($valor);
                        echo '
                        <tr class="text-white fs-4 fst-italic">
                            <td class="fw-bold" style="width: 35%;">' . $valor["nombre"] . '</td>
                            <td class="fw-bold" style="width: 35%;">' . $valor["nick"] . '</td>
                            <td><a href="../controladores/controlador_modificar_socio.php?idSocio=' . $valor["id"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Modificar</button></a></td>
                            <td><a href="../controladores/controlador_desactivar_socio.php?idSocio=' . $valor["id"] . '"><button class="btn btn-danger my-2">Desactivar</button></a></td>
                        </tr>
                    ';
                    }
                    echo '                                
                            </table>
                        </div>';
                } else {
                    echo "No hay socios disponibles.";
                }

                ?>
            </div>

        </section>
        </main>

        <?php pintar_footer(); ?>
</body>

</html>