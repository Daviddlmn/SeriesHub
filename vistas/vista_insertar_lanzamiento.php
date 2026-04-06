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
        <section id="admin" class="d-flex justify-content-evenly align-items-center text-white my-5 vh-100">
            <form action="#" method="post" class="row g-6 text-center">
                <div class="col-md-4">
                    <label for="serie" class="form-label">Elige la serie</label>
                    <select name="serie" class="form-select">
                        <?php foreach ($listaSeries as $Series) { ?>
                            <option value="<?= $Series["id"] ?>">
                                <?= $Series["nombre"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4"> 
                    <label for="plat" class="form-label">Elige la plataforma</label>
                    <select name="plat" class="form-select">
                        <?php foreach ($listaPlat as $plat) { ?>
                            <option value="<?= $plat["id"] ?>">
                                <?= $plat["nombre"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4"> 
                    <label for="date" class="form-label">Elige la fecha del lanzamiento</label>
                    <input type="date" name="fecha" class="p-1" required>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-danger" type="submit" name="enviar">Insertar Lanzamiento</button>
                </div>
            </form>
        </section>

    </main>
    <?php pintar_footer(); ?>
</body>

</html>