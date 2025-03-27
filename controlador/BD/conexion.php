<?php
$conexion = mysqli_connect('localhost', 'root', '', 'tienda');

function devolverConexion(){
    $conexion = mysqli_connect('localhost', 'root', '', 'tienda');
    return $conexion;
}
?>