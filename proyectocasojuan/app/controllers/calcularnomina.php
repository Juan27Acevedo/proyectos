<?php
session_start();
include '../conexion/conexion.php';

$cedula = $_POST['idempleado'];
$ingreso = $_POST['mes'];
$diasl = $_POST['diaslaborados'];
$extras = $_POST['horasextras'];
$nocturnas = $_POST['horasnocturnas'];
$festivos = $_POST['festivos'];
$bono = $_POST['bono'];
$sueldo = $_POST['sueldoneto'];



if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['calcular'])) {
    $sql = "INSERT INTO nomina (`mes`, `diaslaborados`, `horasextras`, `horasnocturnas`, `festivos`, `bono`)
    VALUES ('$ingreso', '$diasl', '$extras', '$nocturnas', '$festivos', '$bono')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Usuario Editado con Exito'); window.location.href='../../public/nomina.php';</script>";
} else {
echo "Error al insertar registro: " . $conexion->error;
}
}





if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['regresar'])){
    echo "holaaaa";
    header('location:../../public/index.php');
}
?>
