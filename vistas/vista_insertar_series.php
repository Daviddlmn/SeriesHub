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
    pinta_menu($id); 
    if ($id!=0){
        echo "<script>alert('No tienes permisos para acceder a este sitio')</script>";
        echo "<script>location.href='../index.php'</script>";
    }?>
    <main>
        <section id="admin" class="container d-flex justify-content-evenly align-items-center text-white my-5 vh-100">
            <form action="../controladores/controlador_insertar_series.php" method="post" enctype="multipart/form-data"  class="row g-3">

                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre de la Serie:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" name="descripcion" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label for="foto" class="form-label">URL de la Foto:</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-danger" type="submit" name="enviar">Insertar Series</button>
                </div>
            </form>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </main>
    <?php pintar_footer(); ?>
</body>

</html>