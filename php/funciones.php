<?php
// include "../modelos/comentarios.php";
// Función comprueba_usuario
// 1. Recibe: nada
// 2. Devuelve: id del usuario que hay logueado ahora mismo o -1 si no hay
// ningún usuario logueado
// 3. Acción: abrirá la sesión, comprobará tanto cookie como sesión y devolverá
// lo que corresponda
function comprueba_usuario()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (isset($_COOKIE["usuario"])) {
        session_decode($_COOKIE["usuario"]);
        // var_dump($_SESSION["id"]);
        return $_SESSION["id"];
    } elseif (isset($_SESSION["id"])) {
        return $_SESSION["id"];
    }
    return -1;
}
function sesionSocio($id, $recordar)
{
    $_SESSION["id"] = $id;
    session_encode();
    if ($recordar == "si") {
        setcookie("usuario", $id, time() * 60 * 60 * 24 * 30, "/"); //30 dias;
    }
}
function cerrarSesionSocio()
{
    session_unset();
    session_destroy();
    setcookie("usuario", $_SESSION["id"], time() - 100, "/");
}

// Función pinta_menu_index
// 1. Recibe: id del usuario conectado
// 2. Devuelve: nada
// 3. Acción: pintará el menú que corresponda según el id que haya recibido. Si
// recibe un -1 quiere decir que no hay nadie logueado. Las rutas serán los
// controladores correspondientes desde el index
function inicio()
{
    echo '
    <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeriesHub</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>;
    <link rel="stylesheet" href="../estilo/estilos.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>
    ';
}
function pinta_menu_index($id)
{
    echo '
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark bg-danger">
            <div class="container-fluid justify-content-center">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand text-center" href="./index.php"><img src="./img/logo.png" class="img-fluid" alt="Logo"></a>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav fs-3">';
    
    if ($id == -1) {
        echo '
                        <li class="nav-item mx-4 fw-bold">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item mx-4 fw-bold">
                            <a href="./controladores/controlador_series.php" class="nav-link">Series</a>
                        </li>
                        <li class="nav-item mx-4 fw-bold">
                            <a class="nav-link" href="./controladores/controlador_plataforma.php">Plataformas</a>
                        </li>
                        <li class="nav-item mx-4 fw-bold">
                            <a class="nav-link" href="./vistas/acceso.php">Acceder</a>
                        </li>';
    } elseif ($id == 0) {
        echo '
                        <li class="nav-item mx-3 fw-bold">
                            <a href="./controladores/controlador_series.php" class="nav-link">Series</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="./controladores/controlador_plataforma.php">Plataformas</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="./controladores/controlador_socios.php">Socios</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="./controladores/controlador_lanzamientos.php">Lanzamientos</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="./controladores/controlador_comentarios.php">Comentarios</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="./controladores/cerrar_sesion.php">Salir</a>
                        </li>';
    } else {
        echo '
                        <li class="nav-item mx-5 fw-bold">
                            <a href="./controladores/controlador_series.php" class="nav-link">Series</a>
                        </li>
                        <li class="nav-item mx-5 fw-bold">
                            <a class="nav-link" href="./controladores/controlador_plataforma.php">Plataformas</a>
                        </li>
                        <li class="nav-item mx-5 fw-bold">
                            <a class="nav-link" href="./controladores/cerrar_sesion.php">Salir</a>
                        </li>';
    }

    echo '
                    </ul>
                </div>
            </div>
        </nav>
    </header>';
}


// Función pinta_menu
// 1. Recibe: id del usuario conectado
// 2. Devuelve: nada
// 3. Acción: pintará el menú que corresponda según el id que haya recibido. Si
// recibe un -1 quiere decir que no hay nadie logueado. Las rutas serán los
// controladores correspondientes desde otras vistas

function pinta_menu($id)
{
    echo '
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark bg-danger">
            <div class="container-fluid justify-content-center">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand text-center" href="../index.php"><img src="../img/logo.png" class="img-fluid" alt="Logo"></a>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav fs-3">';

    if ($id == -1) {
        echo '
                        <li class="nav-item mx-4 fw-bold">
                            <a class="nav-link" href="../index.php">Inicio</a>
                        </li>
                        <li class="nav-item mx-4 fw-bold">
                            <a href="../controladores/controlador_series.php" class="nav-link">Series</a>
                        </li>
                        <li class="nav-item mx-4 fw-bold">
                            <a class="nav-link" href="../controladores/controlador_plataforma.php">Plataformas</a>
                        </li>
                        <li class="nav-item mx-4 fw-bold">
                            <a class="nav-link" href="../vistas/acceso.php">Acceder</a>
                        </li>';
    } elseif ($id == 0) {
        echo '
                        <li class="nav-item mx-3 fw-bold">
                            <a href="../controladores/controlador_series.php" class="nav-link">Series</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="../controladores/controlador_plataforma.php">Plataformas</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="../controladores/controlador_socios.php">Socios</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="../controladores/controlador_lanzamientos.php">Lanzamientos</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="./controlador_comentarios.php">Comentarios</a>
                        </li>
                        <li class="nav-item mx-3 fw-bold">
                            <a class="nav-link" href="../controladores/cerrar_sesion.php">Salir</a>
                        </li>';
    } else {
        echo '
                        <li class="nav-item mx-5 fw-bold">
                            <a href="../controladores/controlador_series.php" class="nav-link">Series</a>
                        </li>
                        <li class="nav-item mx-5 fw-bold">
                            <a class="nav-link" href="../controladores/controlador_plataforma.php">Plataformas</a>
                        </li>
                        <li class="nav-item mx-5 fw-bold">
                            <a class="nav-link" href="../controladores/cerrar_sesion.php">Salir</a>
                        </li>';
    }

    echo '
                    </ul>
                </div>
            </div>
        </nav>
    </header>';
}


function pintar_footer()
{
    echo '<footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="row text-center py-5">
                <div class="col-md-3 my-4">
                    <h2 class="my-4 fs-1">Contacta con Nosotros</h2>
                    <p>Envíanos tus comentarios o sugerencias</p>
                    <p>Contacta con Atención al Cliente</p>
                    <p>Email: info@tuserieapp.com</p>
                    <p>Teléfono: +123 456 789</p>
                    <p>Síguenos en redes sociales</p>
                    <ul class="social-icons list-inline">
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 my-4">
                    <h2 class="my-4 fs-1">Series Populares</h2>
                    <p><a href="#">Game of Thrones</a></p>
                    <p><a href="#">Stranger Things</a></p>
                    <p><a href="#">Breaking Bad</a></p>
                    <p><a href="#">The Mandalorian</a></p>
                    <p><a href="#">The Witcher</a></p>
                    <p><a href="#">Narcos</a></p>
                </div>
                <div class="col-md-3 my-4">
                    <h2 class="my-4 fs-1">Categorías</h2>
                    <p><a href="#">Acción</a></p>
                    <p><a href="#">Drama</a></p>
                    <p><a href="#">Comedia</a></p>
                    <p><a href="#">Ciencia Ficción</a></p>
                    <p><a href="#">Fantasía</a></p>
                    <p><a href="#">Documentales</a></p>
                </div>
                <div class="col-md-3 my-4">
                    <h2 class="my-4 fs-2">Suscríbete </h2>
                    <p>Recibe las últimas noticias y actualizaciones directamente en tu correo electrónico.</p>
                    <form class="my-3">
                        <div class="input-group">
                            <input type="email" class="form-control w-100" placeholder="Tu correo electrónico" aria-label="Tu correo electrónico" aria-describedby="basic-addon2">
                            <button type="submit" class="btn btn-secondary" id="basic-addon2">Suscribirse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>';
}


// Función carrousel_comentarios
// 1. Recibe: matriz con los comentarios para mostrar
// 2. Devuelve: nada
// 3. Acción: dibujará un carrousel donde se mostrarán los comentarios
// recibidos

function comentariosCarrusel($matrizComentarios)
{
    echo '<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    ';
    foreach ($matrizComentarios as $clave => $datos) {
        $activeClass = ($clave == 0) ? 'active' : ''; // Agregamos la clase 'active' al primer comentario
    
        echo '<div class="carousel-item card-dark ' . $activeClass . '" data-bs-interval="10000">
            <div class="carousel-caption row align-items-center justify-content-center text-white carru100">
                <img src="./series/' . $datos["foto"] . '" class="d-block w-25">
                <h2>' . $datos["nombreSerie"] . '</h2>
                <p class="fs-3">' . $datos["nick"] . '</p>
                <p>' . $datos["texto"] . '</p>
                <p>' . $datos["fecha"] . '</p>
            </div>
        </div>';
    }
    
    echo '<button class="carousel-control-prev btn btn-light" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next btn btn-light" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>';
}

function bootstrapCSS()
{
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
}
function bootstrapJS()
{
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>';
}
function CSS_INDEX()
{
    echo '<link rel="stylesheet" href="./estilo/estilos.css">';
}
function CSS()
{
    echo '<link rel="stylesheet" href="../estilo/estilos.css">';
}
function fechaEspañol($fecha)
{
    // echo $fecha;
    setlocale(LC_ALL, "es-ES.UTF-8");
    $fechaArray = explode("-", $fecha);
    $fechaTimeStampt = mktime(0, 0, 0, $fechaArray[1], $fechaArray[2], $fechaArray[0]);
    return strftime("%d de %B de %Y", $fechaTimeStampt);
}
