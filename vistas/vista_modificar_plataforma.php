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
    pinta_menu($id); 
    if ($id!=0){
        echo "<script>alert('No tienes permisos para acceder a este sitio')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
    ?>
    <main>
        <section id="admin" class="container d-flex justify-content-evenly align-items-center text-white my-5 altura70">
        <form action="#" method="post" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nuevo Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Nueva Foto:</label>
                <input type="file" name="foto" class="form-control" required>
            </div>

            <div class="col-12 mb-3">
                <button class="btn btn-danger" type="submit" name="enviar">Modificar Plataforma</button>
            </div>
        </form>
    </section>
    </main>
       
</body>
</html>
