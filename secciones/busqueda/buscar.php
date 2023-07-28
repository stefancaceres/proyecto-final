<?php 
$path="../../";
require_once("../../templates/header.php") ;
require_once("../../db.php");
// Mostrar tabla:
$verTabla = $conexion->prepare("SELECT * FROM `tbl_cochera`");
$verTabla->execute();
$list_tbl_cochera = $verTabla->fetchAll(pdo::FETCH_ASSOC);
$verTabla2 = $conexion->prepare("SELECT * FROM `tbl_registro`");
$verTabla2->execute();
$list_tbl_registro = $verTabla2->fetchAll(pdo::FETCH_ASSOC);
// buscador
// if($_POST){
//     $nombre = (isset($_POST["nombre"])? $_POST["nombre"] : "");
//     $apellido = (isset($_POST["apellido"])? $_POST["apellido"] : "");
//     $marca = (isset($_POST["marca"])? $_POST["marca"] : "");
//     $modelo = (isset($_POST["modelo"])? $_POST["modelo"] : "");
//     $dom = (isset($_POST["dom"])? $_POST["dom"] : "");
//     $buscaCochera = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `dominio` = '$dom'");
//     $buscaCochera->execute();
//     $busq = $buscaCochera->fetch(PDO::FETCH_ASSOC);
    // $verTabla = $conexion->prepare("SELECT * FROM `tbl_cochera`");
    // $verTabla->execute();
    // $list_tbl_cochera = $verTabla->fetchAll(pdo::FETCH_ASSOC);
// };
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
            <form action="./buscado.php" method="post">
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="dom" id="dom" placeholder=" ">
                    <label for="dom">Dominio del vehiculo</label>
                </div>
                <button type="submit" class="boton botonformu btn btn-primary w-100">
                    <p class=" textboton">
                        Buscar vehiculo
                    </p>
                </button>
            </form>
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
            <form action="./buscado.php" method="post">
                <div class="form-floating mb-3">
                    <input
                    type="text"
                    class="form-control formu " name="dominio" id="dominio" placeholder=" ">
                    <label for="dominio">Dominio del vehiculo</label>
                </div>
                <button type="submit" class="boton botonformu btn btn-primary w-100">
                    <p class=" textboton">
                        Buscar vehiculo
                    </p>
                </button>
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
                        <?php foreach ($list_tbl_registro as $registro2) {?>
                        <tr class="slot">
                            <td scope="row">
                                <?php echo $registro2 ['ncochera']; ?>
                            </td>
                            <td>
                                <?php 
                                if($registro2['modelo']=='' && $registro2['marca']==''){
                                    echo 'Cochera vacia';
                                } else{
                                echo $registro2 ['marca'] . ' ' ; echo $registro2['modelo'] . ' ' ; echo $registro2['color'];
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $registro2 ['dominio']; ?>
                            </td>
                            <td>
                                <?php echo $registro2 ['apellido'] . ' ' ; echo $registro2['nombre']; ?>
                            </td>
                            <td>
                                <a class=" btn btn-primary" href="index.php?txtID=<?php echo $registro2 ['ncochera']; ?>" data-bs-toggle="modal" data-bs-target="#ventanaEmergente<?php echo $registro2 ['ncochera']; ?>" >Ver</a>
                            </td>
                        </tr>
                        <!-- Ventana emergente de datos -->
                        <!-- Ventana emergente de datos -->
                        <div class="modal fade" id="ventanaEmergente<?php echo $registro2 ['ncochera']; ?>" tabindex="-1" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content ventanaedit">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="ventanaEmergenteLabel">
                                        El vehiculo ocupaba la cochera N°<?php echo $registro2 ['ncochera']; ?>
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" >
                                    <h5 style="display: inline;">
                                        Nombre del propietario: 
                                    </h5>
                                    <p>
                                    <?php echo $registro2 ['apellido'] . ' ' ; echo $registro2['nombre']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Datos del vehiculo: 
                                    </h5>
                                    <p>
                                    <?php echo $registro2 ['marca'] . ' ' ; echo $registro2['modelo'] . ' ' ; echo $registro2['color']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Dominio del vehiculo: 
                                    </h5>
                                    <p>
                                    <?php echo $registro2['dominio']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Tipo de vehiculo: 
                                    </h5>
                                    <p>
                                    <?php echo $registro2 ['tipo']; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Observaciones: 
                                    </h5>
                                    <p>
                                    <?php echo $registro2 ['obs'] ; ?>
                                    </p>
                                    <h5 style="display: inline;">
                                        Fecha de ingreso: 
                                    </h5>
                                    <p>
                                    <?php echo $registro2 ['fechain'] . ' a la hora ' ; echo $registro2['horain']; ?>
                                    </p>
                                </div>
                                <!-- botones -->
                                <div class="modal-footer">
                                    <!-- <a type="button" class="btn btn-primary">Editar</a> -->
                                    <a type="button" class="btn btn-danger" href="../backend/recepcion.php?borrarID=<?php echo $registro2 ['id']; ?>">Eliminar</a>
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