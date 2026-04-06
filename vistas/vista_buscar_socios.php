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
    <?php 
    pinta_menu($id); 
    if ($id!=0){
        echo "<script>alert('No tienes permisos para acceder a este sitio')</script>";
        echo "<script>location.href='../index.php'</script>";
    }?>

    <main>
        <section id="series" class="bs-dark container">
            <div class="row justify-content-evenly">
            <?php
                if (!is_null($resultadosBusqueda)) {

                    echo "<h2 class='text-white text-center fs-1 my-5'>Resultados de la búsqueda </h2>";
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
                    foreach ($resultadosBusqueda as $socio) {
                        // var_dump($socio);
                        echo '
                        <tr class="text-white fs-4 fst-italic">
                            <td class="fw-bold" style="width: 35%;">' . $socio["nombreSocio"] . '</td>
                            <td class="fw-bold" style="width: 35%;">' . $socio["nick"] . '</td>
                            <td><a href="../controladores/controlador_modificar_socio.php?idSocio=' . $socio["id"] . '" class="my-4 mx-3"><button class="btn btn-danger my-2">Modificar</button></a></td>
                            <td><a href="../controladores/controlador_desactivar_socio.php?idSocio=' . $socio["id"] . '"><button class="btn btn-danger my-2">Desactivar</button></a></td>
                        </tr>
                    ';
                    }
                    echo '                                
                            </table>
                        </div>';

                        echo '                            <a href="../controladores/controlador_socios.php" class="text-center"><button class="btn btn-secondary my-2">Volver atrás</button></a>';
                }else{
                    echo "<h2 class='text-white text-center fs-1 my-5'>No se han encontrado resultados</h2>";
                }
                echo '<a href="../controladores/controlador_socios.php" class="text-center"><button class="btn btn-secondary my-2">Volver atrás</button></a>';
                ?>
            </div>

        </section>
    </main>


    <?php pintar_footer(); ?>
</body>



</html>vista_buscar_socios.php