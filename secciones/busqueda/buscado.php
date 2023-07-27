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
    <div class=" contcochera">
        <div class="contitulo"> 
            <h3 class="display-6 fw-bold titulo">
                Resultado de la busqueda
            </h3>
            <div>
                <?php
                if($_POST){
                    // // Obtiene el valor del campo de entrada de texto
                    // $valor = $_POST['dom'];
                    // // Ejecuta una consulta SQL para buscar la fila que coincide con el valor ingresado
                    // $buscar = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `dominio` = $valor");
                    // // se asigna los valores del get a la consulta
                    // $buscar->execute();
                    // $buscado = $buscar->fetch(PDO::FETCH_ASSOC);
                    // header("Location:./buscado.php");
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
                    header("Location: ./buscado.php?dominio=" . urlencode($valor));
                    print_r($buscado);
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
                            if (isset($_GET["dominio"]) && $_GET["dominio"] != '') {
                                // Recorre las filas del array $list_tbl_cochera
                                foreach ($list_tbl_cochera as $registro) {
                                    // Si el valor del campo "dominio" coincide con el valor buscado, muestra la fila
                                    if ($registro['dominio'] == $_GET["dominio"]) {
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