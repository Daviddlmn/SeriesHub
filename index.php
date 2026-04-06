<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeriesHub</title>
    <?php require_once "./php/funciones.php";
    bootstrapCSS();
    bootstrapJS();
    ?>
    <link rel="stylesheet" href="./estilo/estilos.css">
    <link rel="icon" href="./img/favicon.png" type="image/x-icon">
</head>

<body>

    
    <?php

    /*if (isset($_COOKIE["usuario"])) {
        session_decode($_COOKIE["usuario"]);
    }*/
    $id = comprueba_usuario();
    pinta_menu_index($id);
    ?>
<main>
    <section id="ultimosLanzamientos" class="container">
        <h2 class="text-white text-center fs-1 text-decoration-underline my-5">Ultimos Lanzamientos</h2>
        <div class="row justify-content-evenly">
            <?php
            require_once "./bd/bd.php";
            require_once "./modelos/plataformas.php";
            require_once "./modelos/lanzamiento.php";
            $lanz = new lanzamiento();
            $plat = new plataformas();
            foreach ($plat->listarPlataformas() as $clave => $value) {
                echo "<h2 class='text-white text-center fs-1 my-5'>$value[nombre]</h2>";
                foreach ($lanz->ultimosLanzamietos($value["id"]) as $key => $valor) {
                    echo
                    '
                    <div class=" col-xxl-3 col-md-6 ">
                        <div class="card-dark text-white d-block text-center">
                            <img src="./series/' . $lanz->ultimosLanzamietos($value["id"])[$key]["foto"] . '" class="img-fluid">
                            <h3 class="fs-2 my-4">' . $lanz->ultimosLanzamietos($value["id"])[$key]["nombre"] . '</h3>
                            <p class="text-center mx-3 mb-5"> Lanzamiento: ' . fechaEspañol($lanz->ultimosLanzamietos($value["id"])[$key]["fecha"]) . '</p>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </section>

    <section id="Carrusel" class="row static">
        <div class="col-md-12">
            <h2 class="text-white text-center fs-1 text-decoration-underline my-5">Ultimos Comentarios</h2>
            <?php
            require_once "./modelos/comentarios.php";
            $com = new comentarios();
            comentariosCarrusel($com->ultimosCincoComentarios());
            ?>
        </div>


    </section>

</main>
    


    <?php pintar_footer() ?>
</body>

</html>