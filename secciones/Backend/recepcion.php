<?php 
require_once("../../db.php");
// Vaciar fila
// if(isset($_GET["txtID"]) && $_GET["bandera"]==='eliminar' )
// if(isset($_GET["txtID"])){
//     // se recolecta los datos de get
//     $txtID = ((isset($_GET["txtID"])) ? $_GET["txtID"] : "");
//     // se prepara la eliminacion de tabla
//     $vaciarTabla = $conexion->prepare("UPDATE `tbl_cochera` SET `nombre`='',`apellido`='',`marca`='',`modelo`='',`dominio`='',`color`='',`tipo`='',`obs`='',`fechain`='',`horain`='' where `cochera`=:id");
//     // se asigna los valores del get a la consulta
//     $vaciarTabla->bindValue(":id", $txtID);
//     $vaciarTabla->execute();
//         header("Location:../../index.php");
//         exit;
// };
// Definir la función para eliminar un registro de la tabla
function vaciar_registro($conexion, $txtID) {
    // Preparar la consulta SQL para eliminar el registro
    $vaciarTabla = $conexion->prepare("UPDATE `tbl_cochera` SET `nombre`='',`apellido`='',`marca`='',`modelo`='',`dominio`='',`color`='',`tipo`='',`obs`='',`fechain`='',`horain`='' where `cochera`=:id");  
    // Asignar el valor del ID al parámetro de la consulta
    $vaciarTabla->bindValue(":id", $txtID);  
    // Ejecutar la consulta
    $vaciarTabla->execute();  
    // Redirigir al usuario a la página de inicio
    header("Location:../../index.php");
    exit;
}
function retirar_vehiculo($conexion, $retirarID){
    // se prepara el pasaje de fila de tabla
    $pasaje = $conexion->prepare("INSERT INTO 'tbl_registro' ('ncochera', 'nombre', 'apellido', 'marca', 'modelo', 'dominio', 'color', 'tipo', 'obs', 'fechain', 'horain')
    SELECT 'cochera', 'nombre', 'apellido' , 'marca', 'modelo', 'dominio', 'color', 'tipo', 'obs', 'fechain', 'horain'FROM 'tbl_cochera'");
    // se asigna los valores del get a la consulta
    $pasaje->execute();
    vaciar_registro($conexion, $retirarID);
}
if(isset($_GET["txtID"])){
    // se recolecta los datos de get
    $txtID = ((isset($_GET["txtID"])) ? $_GET["txtID"] : "");
    vaciar_registro($conexion, $txtID);
} elseif(isset($_GET["retirarID"])){
    // se recolecta los datos de get
    $retirarID = ((isset($_GET["retirarID"])) ? $_GET["retirarID"] : "");
    retirar_vehiculo($conexion, $retirarID);    
}
// if(isset($_GET["retirarID"])){
//     $retirarID = ((isset($_GET["retirarID"])) ? $_GET["retirarID"] : "");
//     // se prepara el pase de inmformacion a la tabla de vehiculos retirados
//     $retirar = $conexion->prepare("UPDATE `tbl_cochera` SET `nombre`='',`apellido`='',`marca`='',`modelo`='',`dominio`='',`color`='',`tipo`='',`obs`='',`fechain`='',`horain`='' where `cochera`=:id");
//     // se prepara la eliminacion de tabla
//     $retirar = $conexion->prepare("UPDATE `tbl_cochera` SET `nombre`='',`apellido`='',`marca`='',`modelo`='',`dominio`='',`color`='',`tipo`='',`obs`='',`fechain`='',`horain`='' where `cochera`=:id");
//     // se asigna los valores del get a la consulta
//     $retirar->bindValue(":id", $retirarID);
//     $retirar->execute();
//         header("Location:../../index.php");
//         exit;
// }