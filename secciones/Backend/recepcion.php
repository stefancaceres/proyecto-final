<?php 
require_once("../../db.php");
function vaciar_registro($conexion, $txtID) {
    // Preparar la consulta SQL para vaciar la fila
    $vaciarTabla = $conexion->prepare("UPDATE `tbl_cochera` SET `nombre`='',`apellido`='',`marca`='',`modelo`='',`dominio`='',`color`='',`tipo`='',`obs`='',`fechain`='',`horain`='' where `cochera`=:id");  
    // Asignar el valor del ID al parámetro de la consulta
    $vaciarTabla->bindValue(":id", $txtID);  
    // Ejecutar la consulta
    $vaciarTabla->execute();  
    
}
function borrar_registro($conexion, $borrarID) {
    // Preparar la consulta SQL para eliminar el registro
    $vaciarTabla = $conexion->prepare("DELETE FROM `tbl_registro` WHERE `id`=:id");  
    // Asignar el valor del ID al parámetro de la consulta
    $vaciarTabla->bindValue(":id", $borrarID);  
    // Ejecutar la consulta
    $vaciarTabla->execute();  
    
}
function retirar_vehiculo($conexion, $retirarID){
    // Preparar la consulta SQL para seleccionar la fila
    $retirar = $conexion->prepare("SELECT * FROM `tbl_cochera` WHERE `cochera`=:id");
    $retirar->bindValue(":id", $retirarID);
    $retirar->execute();
    //preparo un array para introducir los datos de la fila
    $fila= $retirar->fetch(pdo::FETCH_ASSOC);
    if($fila){
        $cochera = $fila['cochera'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $marca = $fila['marca'];
        $modelo = $fila['modelo'];
        $dom = $fila['dominio'];
        $color = $fila['color'];
        $tipo = $fila['tipo'];
        $obs = $fila['obs'];
        $fechain = $fila['fechain'];
        $horain = $fila['horain']; 
    } ;      
    //asigno todas las variables a cada columna correspondiente
    $registrar = $conexion->prepare("INSERT INTO `tbl_registro`(`ncochera`,`nombre`,`apellido`,`marca`,`modelo`,`dominio`,`color`,`tipo`,`obs`,`fechain`,`horain`) VALUES ('$cochera','$nombre','$apellido','$marca','$modelo','$dom','$color','$tipo','$obs','$fechain','$horain')");          
    $registrar->execute();
}   
if(isset($_GET["txtID"])){    
    $txtID = ((isset($_GET["txtID"])) ? $_GET["txtID"] : "");
    vaciar_registro($conexion, $txtID);
    header("Location:../../index.php");
    exit;
} elseif(isset($_GET["retirarID"])){    
    $retirarID = ((isset($_GET["retirarID"])) ? $_GET["retirarID"] : "");
    retirar_vehiculo($conexion, $retirarID);
    vaciar_registro($conexion, $retirarID);  
    header("Location:../../index.php");
    exit;  
}elseif(isset($_GET["borrarID"])){
    $borrarID=((isset($_GET["borrarID"])) ? $_GET["borrarID"] : "");
    borrar_registro($conexion, $borrarID);
    header("Location:../busqueda/buscar.php");
    exit;
};