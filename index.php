<?php 
    require_once("./templates/header.php");
    require_once("./db.php");
    // Mostrar tabla:
    $verTabla = $conexion->prepare("SELECT * FROM `tbl_cochera`");
    $verTabla->execute();
    $list_tbl_cochera = $verTabla->fetchAll(pdo::FETCH_ASSOC);


    // Editar tabla:
    if($_POST){
        // recolectar los datos del método post
        $nombre = (isset($_POST["nombre"])? $_POST["nombre"] : "");
        $apellido = (isset($_POST["apellido"])? $_POST["apellido"] : "");
        $marca = (isset($_POST["marca"])? $_POST["marca"] : "");
        $modelo = (isset($_POST["modelo"])? $_POST["modelo"] : "");
        $dom = (isset($_POST["dom"])? $_POST["dom"] : "");
        $color = (isset($_POST["color"])? $_POST["color"] : "");
        $tipo = (isset($_POST["tipo"]));
        $obs = (isset($_POST["obs"])? $_POST["obs"] : "");
        $fechain = (isset($_POST["fechain"])? $_POST["fechain"] : "");
        $horain = (isset($_POST["horain"])? $_POST["horain"] : "");
    
        // buscar la primera fila vacía en la tabla
        $formulario = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `nombre` = '' AND `apellido` = '' AND `marca` = '' AND `modelo` = '' AND `dominio` = '' AND `color` = '' AND `obs` = '' LIMIT 1");
        $formulario->execute();
        $fila = $formulario->fetch(PDO::FETCH_ASSOC);
        
    
        if ($fila) {
            // actualizar la fila en la tabla
            $ncochera = $fila["cochera"];
            $formulario = $conexion->prepare("UPDATE `tbl_cochera` SET `nombre` = :nombre, `apellido` = :apellido, `marca` = :marca, `modelo` = :modelo, `dominio` = :dominio, `color` = :color, `tipo` = :tipo, `obs` = :obs, `fechain` = :fechain, `horain` = :horain where `cochera` = $ncochera");
            $formulario->bindValue(":nombre", $nombre);
            $formulario->bindValue(":apellido", $apellido);
            $formulario->bindValue(":marca", $marca);
            $formulario->bindValue(":modelo", $modelo);
            $formulario->bindValue(":dominio", $dom);
            $formulario->bindValue(":color", $color);
            $formulario->bindValue(":tipo", $tipo);
            $formulario->bindValue(":obs", $obs);
            $formulario->bindValue(":fechain", $fechain);
            $formulario->bindValue(":horain", $horain);
            $formulario->execute();
            header("Location:index.php");
            exit;
        } else {
            // mostrar mensaje de cochera llena
            ?>
            <script>
                document.getElementById('msjLleno').style.display = 'block';
            </script>
            <?php
        }
    };

    
    
?>


    
        <div class="container cont mt-2 mb-5">
            <div class="row ">
                <!-- primera col -->
                <!-- primera columna -->
                <!-- primera columna -->
                <!-- primera columna -->
                <!-- primera columna -->
                <!-- primera columna -->
                <div class="col-md-4 contformu">
                    <div class="contitulo"> 
                        <h3 class="display-6 fw-bold titulo">
                            Ingreso de vehiculo
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
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de vehiculo</label>
                            <select class="form-select form-select-lg formu " name="tipo" id="tipo">
                                <option selected>Seleccione un tipo</option>
                                <option value="Auto">Auto</option>
                                <option value="Camioneta">Camioneta</option>
                                <option value="SUV">SUV</option>
                                <option value="Trafic">Trafic</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="obs" class="form-label">Observaciones</label>
                            <textarea class="form-control formu  " name="obs" id="obs" rows="3"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <input
                            type="date"
                            class="form-control formu " name="fechain" id="fechain" placeholder=" ">
                            <label for="fechain">Fecha de ingreso</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input
                            type="time"
                            class="form-control formu " name="horain" id="horain" placeholder=" ">
                            <label for="horain">Hora de ingreso</label>
                        </div>
                        <button type="submit" class="boton botonformu btn btn-primary w-100" >
                            <p class=" textboton" id="" href="./index.php" >
                                Almacenar vehiculo
                            </p>
                        </button>
                        <!-- alertas de error -->
                        <div class="alert alert-danger aviso " id="msjRellenar" role="alert" >
                            <!-- <strong>Vehiculo no ingresado.</strong> Rellene todos los campos -->
                            <h4 class="alert-heading">Vehiculo no ingresado.</h4>
                            <p>Rellene todos los campos por favor.</p>
                        </div>
                        <div class="alert alert-danger aviso"  id="msjLleno" role="alert">
                            <!-- <strong>Vehiculo no ingresado.</strong> Rellene todos los campos -->
                            <h4 class="alert-heading">Vehiculo no ingresado.</h4>
                            <p>La cochera no tiene mas espacio, retire algun vehiculo para poder ingresar otro.</p>
                        </div>
                        
                    </form>
                </div>
                

                <!-- segunda columna -->
                <!-- segunda columna -->
                <!-- segunda columna -->
                <!-- segunda columna -->
                <!-- segunda columna -->
                <div class="col-md contcochera">
                    <div class="contitulo">
                        <h3 class="display-6 fw-bold titulo">
                            Estado de cochera
                        </h3>
                    </div>
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
                                    <?php foreach ($list_tbl_cochera as $registro) {?>
                                    <tr class="slot">
                                        <td scope="row">
                                            <?php echo $registro ['cochera']; ?>
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
                                            <a class=" btn btn-primary" href="index.php?txtID=<?php echo $registro ['cochera']; ?>" data-bs-toggle="modal" data-bs-target="#ventanaEmergente<?php echo $registro ['cochera']; ?>" >Ver</a>
                                        </td>
                                    </tr>
                                    <!-- Ventana emergente de datos -->
                                    <!-- Ventana emergente de datos -->
                                    <div class="modal fade" id="ventanaEmergente<?php echo $registro ['cochera']; ?>" tabindex="-1" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content ventanaedit">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="ventanaEmergenteLabel">
                                                    Datos de la cochera N°<?php echo $registro ['cochera']; ?>
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
                                                <a type="button" class="btn btn-warning" href="./secciones/Backend/recepcion.php?txtID=<?php echo $registro ['cochera']; ?>">Retirar</a>
                                                <a type="button" class="btn btn-danger" href="./secciones/Backend/recepcion.php?txtID=<?php echo $registro ['cochera']; ?>">Eliminar</a>
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
        </div>
<script src="./scripts.js"></script>
<?php require_once("./templates/footer.php") ?>