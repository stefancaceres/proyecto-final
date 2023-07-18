<?php

    $dbname="cochera";
    $user="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=$dbname";
try {
    $conexion = new PDO($dsn, $user, $password);
} catch (PDOException $e){

echo $e->getMessage();

} 