<?php 
$path="../../";
require_once("../../templates/header.php") ;
require_once("../../db.php");
// Mostrar tabla:
$verTabla1 = $conexion->prepare("SELECT * FROM `tbl_cochera`");
$verTabla1->execute();
$list_tbl_cochera = $verTabla1->fetchAll(pdo::FETCH_ASSOC);
$verTabla2 = $conexion->prepare("SELECT * FROM `tbl_registro`");
$verTabla2->execute();
$list_tbl_registro = $verTabla2->fetchAll(pdo::FETCH_ASSOC);
?>
    <div class="buscado">
        <div class="contbuscado">
            <div class="contitulo"> 
                <h3 class="display-6 fw-bold titulo">
                    Resultado de la busqueda
                </h3>
            </div>    
            <div>
                <?php
                if(isset($_POST["dom"]) && $_POST["dom"] != ''){                 
                    // Obtiene el valor del campo de entrada de texto
                    $valor = $_POST['dom'];                        
                    // Ejecuta una consulta SQL utilizando un parámetro preparado
                    $buscar = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `dominio` = :valor");
                    // Asigna el valor del parámetro preparado
                    $buscar->bindParam(':valor', $valor);                        
                    // Ejecuta la consulta
                    $buscar->execute();                        
                    // Obtén el resultado de la consulta
                    $buscado = $buscar->fetch(PDO::FETCH_ASSOC);                        
                    // Redirige a la página "buscado.php" con el resultado de la búsqueda
                    header("Location: ./buscado.php?dom=" . urlencode($valor));                    
                    exit;
                }elseif(isset($_POST["dominio"]) && $_POST["dominio"] != ''){            
                    // Obtiene el valor del campo de entrada de texto
                    $valor = $_POST['dominio'];                        
                    // Ejecuta una consulta SQL utilizando un parámetro preparado
                    $buscar = $conexion->prepare("SELECT * FROM `tbl_registro` WHERE `dominio` = :valor");
                    // Asigna el valor del parámetro preparado
                    $buscar->bindParam(':valor', $valor);                        
                    // Ejecuta la consulta
                    $buscar->execute();                        
                    // Obtén el resultado de la consulta
                    $buscado = $buscar->fetch(PDO::FETCH_ASSOC);                        
                    // Redirige a la página "buscado.php" con el resultado de la búsqueda
                    header("Location: ./buscado.php?dominio=" . urlencode($valor));                    
                    exit;
                };
                ?>
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
                            <?php
                            $encontrado = false; 
                            // Bandera para verificar si se encontró el vehículo buscado
                            // Verifica si el valor del campo "dominio" está presente en $_GET
                            if (isset($_GET["dom"]) && $_GET["dom"] != '') {
                                // Recorre las filas del array $list_tbl_cochera
                                foreach ($list_tbl_cochera as $registro) {
                                    // Si el valor del campo "dominio" coincide con el valor buscado, muestra la fila
                                    if ($registro['dominio'] == $_GET["dom"]) {
                                        $encontrado = true;
                            ?>
                            <tr class="slot">
                                <td scope="row">
                                    <?php echo $registro['cochera']; ?>
                                </td>
                                <td>
                                    <?php echo $registro['marca'] . ' '; 
                                    echo $registro['modelo'] . ' ';
                                    echo $registro['color'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $registro['dominio']; ?>
                                </td>
                                <td>
                                    <?php echo $registro['apellido'] . ' '; echo $registro['nombre']; ?>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            }elseif(isset($_GET["dominio"]) && $_GET["dominio"] != '') {
                                // Recorre las filas del array $list_tbl_cochera
                                foreach ($list_tbl_registro as $registro) {
                                    // Si el valor del campo "dominio" coincide con el valor buscado, muestra la fila
                                    if ($registro['dominio'] == $_GET["dominio"]) {
                                        $encontrado = true;
                            ?>
                            <tr class="slot">
                                <td scope="row">
                                    <?php echo $registro['ncochera']; ?>
                                </td>
                                <td>
                                    <?php echo $registro['marca'] . ' '; 
                                    echo $registro['modelo'] . ' ';
                                    echo $registro['color'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $registro['dominio']; ?>
                                </td>
                                <td>
                                    <?php echo $registro['apellido'] . ' '; echo $registro['nombre']; ?>
                                </td>
                                <td>
                                    <a class=" btn btn-primary" href="index.php?txtID=<?php echo $registro ['ncochera']; ?>" data-bs-toggle="modal" data-bs-target="#ventanaEmergente<?php echo $registro ['ncochera']; ?>" >Ver</a>
                                </td>
                            </tr>
                            <div class="modal fade" id="ventanaEmergente<?php echo $registro ['ncochera']; ?>" tabindex="-1" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ventanaedit">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="ventanaEmergenteLabel">
                                                El vehiculo ocupaba la cochera N°<?php echo $registro ['ncochera']; ?>
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
                                            <!-- <a type="button" class="btn btn-primary">Editar</a> -->
                                            <a type="button" class="btn btn-danger" href="../backend/recepcion.php?borrarID=<?php echo $registro ['id']; ?>">Eliminar</a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>            
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            }
                            // Si no se encontró el vehículo buscado, muestra el mensaje una vez al final
                            if (!$encontrado) {
                            ?>
                            <tr>
                                <td colspan="4">
                                    No se encontró el vehículo buscado.
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once("../../templates/footer.php") ?>