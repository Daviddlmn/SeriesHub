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
<?php require_once "../php/funciones.php";
    $id = comprueba_usuario();
    pinta_menu($id);?>
    <main>
        <section id="user" class="container d-flex justify-content-evenly align-items-center text-white my-5 vh-100">
            <form action="#" method="post" enctype="multipart/form-data"  class="row g-3">

                <div class="col-md-12">
                    <label for="nombre" class="form-label">Escribe tu comentario</label>
                    <input type="textarea" name="texto" class="form-control" required>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-danger" type="submit" name="enviar">Enviar</button>
                </div>
            </form>
        </section>
    </main>
    <?php pintar_footer(); ?>
</body>

</html>