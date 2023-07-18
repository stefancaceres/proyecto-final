<?php 
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