<?php
$servername = "localhost";  //servidor
$username = "root";  //reemplazar_con_tu_usuario
$password = "";  //contraseña
$dbname = "papeleria"; //nombre_basededatos

//cear_conexion

$conn = new mysqli($servername,$username,$password,$dbname);

//verificar_conexion
if ($conn->connect_error){
    die("Error de conexión: " . $conn->connect_error);
}
?>