<?php 
    require_once("./templates/header.php");
    require_once("./db.php");
    // Mostrar tabla:
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_cochera`");
    $sentencia->execute();
    $list_tbl_cochera = $sentencia->fetchAll(pdo::FETCH_ASSOC);
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
        $ncochera = $fila["cochera"];
    
        if ($fila) {
            // actualizar la fila en la tabla
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
        } else {
            // mostrar mensaje de cochera llena
            ?>
            <script>
                alert("No hay más espacio disponible. Se debe retirar un auto primero.");
            </script>
            <?php
        }
    
        // header()
    };
    
?>


    <main>
        <div class="container cont mt-2 mb-5">
            <div class="row ">
                <!-- primera col -->
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
                        <button type="submit" class="boton btn btn-primary w-100" >
                            <p class=" textboton" href="./index.php" >
                                Almacenar vehiculo
                            </p>
                        </button>
                    </form>
                </div>
                
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
                                    <?php foreach ($list_tbl_cochera as $registro) {?>
                                    <tr class="">
                                        <td scope="row">
                                            <?php echo $registro ['cochera']; ?>
                                        </td>
                                        <td>
                                            <?php echo $registro ['marca'] . ' ' ; echo $registro['modelo'] . ' ' ;  echo $registro['color'];?>
                                        </td>
                                        <td>
                                            <?php echo $registro ['dominio']; ?>
                                        </td>
                                        <td>
                                            <?php echo $registro ['apellido'] . ' ' ; echo $registro['nombre']; ?>
                                        </td>
                                        <td>
                                            <button class="boton btn btn-primary" onclick="mostrarMiniPantalla()">Editar</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <div id="mini-pantalla" style="display: none;">
                                        <h2>Cochera N°: $registro</h2>
                                        <p>Contenido de la mini pantalla</p>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </main>



    <!-- <script src="./scripts.js"></script> -->
<?php require_once("./templates/footer.php") ?>