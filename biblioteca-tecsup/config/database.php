<?php
$host = "localhost";
$user = "root"; 
$pass = "";     
$db   = "biblioteca_digital";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("error de conexion: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
?>