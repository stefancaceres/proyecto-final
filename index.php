<?php 
    require_once("./templates/header.php");
    require_once("./db.php");
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_cochera`");
    $sentencia->execute();
    $list_tbl_cochera = $sentencia->fetchAll(pdo::FETCH_ASSOC);
    // print_r($list_tbl_cochera);
    if($_POST){
    // recolectar los datos del metodo post
    $nombre=(isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $apellido=(isset($_POST["apellido"]) ? $_POST["apellido"] : "");
    $marca=(isset($_POST["marca"]) ? $_POST["marca"] : "");
    $modelo=(isset($_POST["modelo"]) ? $_POST["modelo"] : "");
    $dom=(isset($_POST["dom"]) ? $_POST["dom"] : "");
    $color=(isset($_POST["color"]) ? $_POST["color"] : "");
    $tipo=(isset($_POST["tipo"]));
    $obs=(isset($_POST["obs"]) ? $_POST["obs"] : "");
    $fechain=(isset($_POST["fechain"]) ? $_POST["fechain"] : "");
    $horain=(isset($_POST["horain"]) ? $_POST["horain"] : "");
    $formulario = $conexion->prepare("INSERT INTO `tbl_cochera`(`cochera`, `nombre`, `apellido`, `marca`, `modelo`, `dominio`, `color`, `tipo`, `obs`, `fechain`, `horain`) VALUES (null,:nombre,:apellido,:marca,:modelo,:dom,:color,:tipo,:obs,:fechain,:horain)");
    $formulario->bindValue(":nombre",$nombre);
    $formulario->bindValue(":apellido",$apellido);
    $formulario->bindValue(":marca",$marca);
    $formulario->bindValue(":modelo",$modelo);
    $formulario->bindValue(":dom",$dom);
    $formulario->bindValue(":color",$color);
    $formulario->bindValue(":tipo",$tipo);
    $formulario->bindValue(":obs",$obs);
    $formulario->bindValue(":fechain",$fechain);
    $formulario->bindValue(":horain",$horain);
    $formulario->execute();
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
                        <button type="submit" class="boton btn btn-primary w-100">
                            <p class=" textboton">
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
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </main>



    <!-- <script src="./scripts.js"></script> -->
<?php require_once("./templates/footer.php") ?>