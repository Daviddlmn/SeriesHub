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
    <?php
    pinta_menu($id);
    if ($id!=0){
        echo "<script>alert('No tienes permisos para acceder a este sitio')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
    ?>
    <main>
        <section id="admin" class="container d-flex justify-content-evenly align-items-center text-white my-5 vh-100">
            <form action="#" method="post" enctype="multipart/form-data" class="row g-3">
                <div class="col-12 col-md-6">
                    <input type="date" name="fecha" class="form-control" required>
                </div>
                <div class="col-12 col-md-6">
                    <input type="submit" name="enviar" value="Modificar Fecha" class="btn btn-danger">
                </div>
            </form>
        </section>

    </main>
    <?php
    pintar_footer();
    ?>
</body>

</html>