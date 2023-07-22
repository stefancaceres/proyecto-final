<?php 
$path="../../";
require_once("../../templates/header.php") ;
require_once("../../db.php");
// buscar la primera fila vacía en la tabla
if($_POST){
    $nombre = (isset($_POST["nombre"])? $_POST["nombre"] : "");
    $apellido = (isset($_POST["apellido"])? $_POST["apellido"] : "");
    $marca = (isset($_POST["marca"])? $_POST["marca"] : "");
    $modelo = (isset($_POST["modelo"])? $_POST["modelo"] : "");
    $dom = (isset($_POST["dom"])? $_POST["dom"] : "");
    $buscaCochera = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `nombre` = '$nombre' or `apellido` = '$apellido' or `marca` = '$marca' or `modelo` = '$modelo' or `dominio` = '$dom'");
    $buscaCochera->execute();
    $fila = $buscaCochera->fetch(PDO::FETCH_ASSOC);
    $verTabla = $conexion->prepare("SELECT * FROM `tbl_cochera`");
    $verTabla->execute();
    $list_tbl_cochera = $verTabla->fetchAll(pdo::FETCH_ASSOC);
}
?>

<!-- inicio main -->

<div class="container cont mt-2 mb-5">
    <div class="row ">
        <!-- primera columna -->
        <!-- primera columna -->
        <div class="col-md-4 contformu">
            <div class="contitulo"> 
                <h3 class="display-6 fw-bold titulo">
                    Busqueda de vehiculo en cochera
                </h3>
            </div>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu" name="nombre" id="nombre" placeholder=" ">
                    <label for="nombre">Nombre del dueño</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="apellido" id="apellido" placeholder=" ">
                    <label for="apellido">Apellido del dueño</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="marca" id="marca" placeholder=" ">
                    <label for="marca">Marca del vehiculo</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="modelo" id="modelo" placeholder=" ">
                    <label for="modelo">Modelo</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="dom" id="dom" placeholder=" ">
                    <label for="dom">Dominio</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu  " name="color" id="color" placeholder=" ">
                    <label for="color">Color</label>
                </div>
            </form>
            <button type="submit" class="boton botonformu btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ventanaEmergente">
                <p class=" textboton"  >
                    Buscar vehiculo
                </p>
            </button>
                        <!-- alertas de error -->
            <div class="alert alert-danger aviso " id="msjRellenar" role="alert" >
                        <!-- <strong>Vehiculo no ingresado.</strong> Rellene todos los campos -->
                <h4 class="alert-heading">Vehiculo no encontrado.</h4>
                <p>Rellene todos los campos por favor.</p>
            </div>
            <div class="alert alert-danger aviso"  id="msjLleno" role="alert">
                        <!-- <strong>Vehiculo no ingresado.</strong> Rellene todos los campos -->
                <h4 class="alert-heading">Rellene al menos uno de los campos</h4>
            </div>
            <div class="modal fade" id="ventanaEmergente" tabindex="-1" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content ventanaedit">
                        <div class="modal-header">
                            <h3 class="modal-title" id="ventanaEmergenteLabel">
                                Datos de la cochera N°<?php echo $list_tbl_cochera ['cochera']; ?>
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" >
                            <h5 style="display: inline;">
                                Nombre del propietario: 
                            </h5>
                            <p>
                                <?php echo $list_tbl_cochera ['apellido'] . ' ' ; echo $list_tbl_cochera['nombre']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Datos del vehiculo: 
                            </h5>
                            <p>
                                <?php echo $list_tbl_cochera ['marca'] . ' ' ; echo $list_tbl_cochera['modelo'] . ' ' ; echo $list_tbl_cochera['color']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Dominio del vehiculo: 
                            </h5>
                            <p>
                                <?php echo $list_tbl_cochera['dominio']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Tipo de vehiculo: 
                            </h5>
                            <p>
                                <?php echo $list_tbl_cochera ['tipo']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Observaciones: 
                            </h5>
                            <p>
                                <?php echo $list_tbl_cochera ['obs'] ; ?>
                            </p>
                            <h5 style="display: inline;">
                                Fecha de ingreso: 
                            </h5>
                            <p>
                                <?php echo $list_tbl_cochera ['fechain'] . ' a la hora ' ; echo $list_tbl_cochera['horain']; ?>
                            </p>
                        </div>
                            <!-- botones -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Editar</button>
                            <button type="button" class="btn btn-warning" href="index.php?txtID=">Retirar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
                <!-- <?php echo $registro ['cochera']; ?> -->
                <!-- segunda columna -->
                <!-- segunda columna -->
        <div class="col-md contcochera">
            <div class="contitulo"> 
                <h3 class="display-6 fw-bold titulo">
                    Busqueda de vehiculo retirado
                </h3>
            </div>
        </div>
    </div>

<!-- Fin main -->

<?php require_once("../../templates/footer.php") ?>