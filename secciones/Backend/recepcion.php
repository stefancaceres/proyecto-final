<?php 
// Eliminar fila
if(isset($_GET["txtID"]) && $_GET["bandera"]==='eliminar' ){
    // se recolecta los datos de get
    $txtID = ((isset($_GET["txtID"])) ? $_GET["txtID"] : "");
    // se prepara la eliminacion de tabla
    $borrarTabla = $conexion->prepare("DELETE FROM `tbl_cochera` WHERE `cochera`=:id");
    // se asigna los valores del get a la consulta
    $borrarTabla->bindValue(":id", $txtID);
    $borrarTabla->execute();
        header("Location:index.php");
        exit;
}
