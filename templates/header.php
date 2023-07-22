<?php 
    $url_base="http://localhost/backend-dm/proyectos/proyecto%20final/";
    // $url_base="http://localhost/trabajos/proyecto-final/";
?>

<!doctype html>
<html lang="en">

<head>
    <title>Cochera virtual</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../proyecto final/estilos.css">
    <link rel="stylesheet" href="../estilos.css"> -->
    <!-- <link rel="stylesheet" href="../estilos.css"> -->
    <link rel="stylesheet" href="<?php echo isset($path)? $path:"" ?>styles.css">
</head>
<body class="">
    <header>
        <nav class=" nave navbar navbar-expand justify-content-around ">
            <ul class="nav-item contlinks  ">
                <a class="nav-link " href="<?php echo $url_base ?>">
                    <h3>Inicio</h3>
                </a>
            </ul>
            <div>
                <h1 class="display-5  fw-bold">
                    Cochera virtual
                </h1>
            </div>
            <ul class="nav-item contlinks">
                <a class="nav-link" href="<?php echo $url_base ?>secciones/busqueda/buscar.php">
                    <h3>Busqueda </h3>
                </a>
            </ul>
        </nav>
    </header>

    <main>