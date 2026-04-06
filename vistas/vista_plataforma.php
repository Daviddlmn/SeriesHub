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

    <?php if ($id == 0) { ?>
        <section id="admin" class="container d-flex justify-content-evenly my-5 vh-80">
            <a href="../controladores/controlador_insertar_plataforma.php"><button class="btn btn-danger">Insertar
                    plataforma</button></a>
            <div>
                <form action="../controladores/controlador_buscar_plataformas.php" method="post">
                    <input type="search" class="btn btn-danger" name="buscar">
                    <input type="submit" name="enviar" class="btn btn-danger" value="Buscar plataforma">
                </form>
            </div>

        </section>
    <?php } ?>
        <section id="series" class="bs-dark container">
        <h2 class='text-white text-center fs-2 my-4 text-decoration-underline'>Plataformas disponibles</h2>";
            <div class="row justify-content-evenly align-items-center">
                <?php                
                // var_dump($plataformas);
                foreach ($plataformas as $plataforma) {
                    echo '
                    <div class="col-md-4 desplegable">
                        <a href="../controladores/controlador_mostrar_plataforma.php?idPlat='.$plataforma["id"].'"><img src="../plataformas/' . $plataforma["logotipo"].'" class="img-fluid rounded-start" style="min-width: 100%;" ></a>
                    </div>
                    ';
                }
                ?>
            </div>
            
        </section>
    </main>
    <?php pintar_footer(); ?>
</body>



</html>