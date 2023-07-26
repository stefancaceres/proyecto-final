<?php 
$path="../../";
require_once("../../templates/header.php") ;
require_once("../../db.php");
// Mostrar tabla:
$verTabla2 = $conexion->prepare("SELECT * FROM `tbl_registro`");
$verTabla2->execute();
$list_tbl_registro = $verTabla2->fetchAll(pdo::FETCH_ASSOC);
// buscador
if($_POST){
    $nombre = (isset($_POST["nombre"])? $_POST["nombre"] : "");
    $apellido = (isset($_POST["apellido"])? $_POST["apellido"] : "");
    $marca = (isset($_POST["marca"])? $_POST["marca"] : "");
    $modelo = (isset($_POST["modelo"])? $_POST["modelo"] : "");
    $dom = (isset($_POST["dom"])? $_POST["dom"] : "");
    $buscaCochera = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `dominio` = '$dom'");
    $buscaCochera->execute();
    $busq = $buscaCochera->fetch(PDO::FETCH_ASSOC);
    // $verTabla = $conexion->prepare("SELECT * FROM `tbl_cochera`");
    // $verTabla->execute();
    // $list_tbl_cochera = $verTabla->fetchAll(pdo::FETCH_ASSOC);
};
print_r($busq);
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
                    <label for="nombre">Nombre del propietario</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="apellido" id="apellido" placeholder=" ">
                    <label for="apellido">Apellido del propietario</label>
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
                    class="form-control formu " name="dom" id="dom" href="index.php?txtID=<?php echo $busq ['cochera']; ?>" placeholder=" ">
                    <label for="dom">Dominio</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu  " name="color" id="color" placeholder=" ">
                    <label for="color">Color</label>
                </div>
            </form>
            <a type="submit" class="boton botonformu btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ventanaEmergente">
                <p class=" textboton"  >
                    Buscar vehiculo
                </p>
            </a>
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
            <!-- ventana emergente -->
            <div class="modal fade" id="ventanaEmergente" tabindex="-1" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content ventanaedit">
                        <div class="modal-header">
                            <h3 class="modal-title" id="ventanaEmergenteLabel">
                                Datos de la cochera N°<?php echo $fila['cochera']; ?>
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" >
                            <h5 style="display: inline;">
                                Nombre del propietario: 
                            </h5>
                            <p>
                                <?php echo $fila['apellido'] . ' ' ; echo $fila['nombre']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Datos del vehiculo: 
                            </h5>
                            <p>
                                <?php echo $fila['marca'] . ' ' ; echo $fila['modelo'] . ' ' ; echo $fila['color']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Dominio del vehiculo: 
                            </h5>
                            <p>
                                <?php echo $fila['dominio']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Tipo de vehiculo: 
                            </h5>
                            <p>
                                <?php echo $fila['tipo']; ?>
                            </p>
                            <h5 style="display: inline;">
                                Observaciones: 
                            </h5>
                            <p>
                                <?php echo $fila['obs'] ; ?>
                            </p>
                            <h5 style="display: inline;">
                                Fecha de ingreso: 
                            </h5>
                            <p>
                                <?php echo $fila['fechain'] . ' a la hora ' ; echo $fila['horain']; ?>
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
                <!-- <?php echo $registro ['ncochera']; ?> -->
                <!-- segunda columna -->
                <!-- segunda columna -->
        <div class="col-md contcochera">
            <div class="contitulo"> 
                <h3 class="display-6 fw-bold titulo">
                    Busqueda de vehiculo retirado
                </h3>
            </div>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu" name="nombre" id="nombre" placeholder=" ">
                    <label for="nombre">Nombre del propietario</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="apellido" id="apellido" placeholder=" ">
                    <label for="apellido">Apellido del propietario</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="apellido" id="apellido" placeholder=" ">
                    <label for="apellido">Dominio del vehiculo</label>
                </div>
                <a type="submit" class="boton botonformu btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ventanaEmergente">
                <p class=" textboton"  >
                    Buscar vehiculo
                </p>
                </a>
            </form>
            <div class="table-responsive-lg">
                <table class="table  ">
                    <thead>
                        <tr>
                            <th scope="col">Cochera</th>
                            <th scope="col">Vehiculo</th>
                            <th scope="col">Dominio</th>
                            <th scope="col">Propietario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- filas -->
                        <?php foreach ($list_tbl_registro as $registro) {?>
                        <tr class="slot">
                            <td scope="row">
                                <?php echo $registro ['ncochera']; ?>
                            </td>
                            <td>
                                <?php 
                                if($registro['modelo']=='' && $registro['marca']==''){
                                    echo 'Cochera vacia';
                                } else{
                                echo $registro ['marca'] . ' ' ; echo $registro['modelo'] . ' ' ; echo $registro['color'];
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $registro ['dominio']; ?>
                            </td>
                            <td>
                                <?php echo $registro ['apellido'] . ' ' ; echo $registro['nombre']; ?>
                            </td>
                            <td>
                                <a class=" btn btn-primary" href="index.php?txtID=<?php echo $registro ['ncochera']; ?>" data-bs-toggle="modal2" data-bs-target="#ventanaEmergente<?php echo $registro ['ncochera']; ?>" >Ver</a>
                            </td>
                        </tr>
                        <!-- Ventana emergente de datos -->
                        <!-- Ventana emergente de datos -->
                        <div class="modal fade" id="<?php echo $registro ['ncochera']; ?>" tabindex="-1" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content ventanaedit">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="ventanaEmergenteLabel">
                                        El vehiculo se encontraba en la cochera N°<?php echo $registro ['ncochera']; ?>
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" >
                                    <h5 style="display: inline;">
                                        Nombre del propietario: 
                                    </h5>
                                    <p>
                                    <?php echo $registro ['apellido'] . ' ' ; echo $registro['nombre']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Datos del vehiculo: 
                                    </h5>
                                    <p>
                                    <?php echo $registro ['marca'] . ' ' ; echo $registro['modelo'] . ' ' ; echo $registro['color']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Dominio del vehiculo: 
                                    </h5>
                                    <p>
                                    <?php echo $registro['dominio']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Tipo de vehiculo: 
                                    </h5>
                                    <p>
                                    <?php echo $registro ['tipo']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Observaciones: 
                                    </h5>
                                    <p>
                                    <?php echo $registro ['obs'] ; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Fecha de ingreso: 
                                    </h5>
                                    <p>
                                    <?php echo $registro ['fechain'] . ' a la hora ' ; echo $registro['horain']; ?>
                                    </p>
                                </div>
                                <!-- botones -->
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-primary">Editar</a>
                                    <a type="button" class="btn btn-warning" href="./secciones/Backend/recepcion.php?txtID=<?php echo $registro ['ncochera']; ?>">Retirar</a>
                                    <a type="button" class="btn btn-danger" href="./secciones/Backend/recepcion.php?txtID=<?php echo $registro ['ncochera']; ?>">Eliminar</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>            
                            </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Fin main -->

<?php require_once("../../templates/footer.php") ?>