<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeriesHub</title>
    <?php require_once "../php/funciones.php";
    bootstrapCSS();
    bootstrapJS();
    CSS(); ?>
    <link rel="stylesheet" href="../estilo/estilos.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>
 <body>
    <?php
    pinta_menu(comprueba_usuario());
    ?>
    <section id="iniciar" class="row justify-content-center align-items-center vh-100">
        <div class="card-danger text-center mx-auto col-md-6">
            <h2 class="text-white text-center fs-1 text-decoration-underline my-5">Inicio de Sesión</h2>
            <form action="../controladores/control_acceso.php" method="POST" class="p-3">
                <input type="text" name="usuario" placeholder="Escriba su nombre de usuario" class="form-control mb-2 text-center py-2">
                <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2 py-2 text-center">
                <div class="d-flex justify-content-center align-items-center my-3">
                    <label for="recordar" class="text-white fs-4">Recordar mi sesión</label>
                    <input type="checkbox" name="recordar" class=" form-check-input bg-danger mx-5 p-2">
                </div>
                <input type="submit" value="Iniciar sesión" name="enviar" class="btn btn-danger">
            </form>
        </div>
    </section>
    <?php pintar_footer() ?>
    </body>

</html>