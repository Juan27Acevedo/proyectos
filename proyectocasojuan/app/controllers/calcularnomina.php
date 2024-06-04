<?php
session_start();
include '../conexion/conexion.php';


$cedula = $_POST['idempleado'];
$horas_extras = $_POST['horasextras'];
$horas_nocturnas = $_POST['horasnocturnas']; 
$horas_festivas = $_POST['festivos'];
$bono = $_POST['bono'];


function calcularSalarioBase($conn, $cedula) {
    $sql = "SELECT salario FROM empleado WHERE idempleado='$cedula'";
    $resultado = mysqli_query($conn, $sql);
    
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        return $fila['salario'];
    } else {
        return 0; 
    }
}


function calcularSalarioTotal($salario_base, $horas_extras, $horas_nocturnas, $horas_festivas, $bono) {
    // Calcula el salario total sin incluir el bono
    $salario_total = $salario_base + $horas_extras * 6915 + $horas_nocturnas * 9681 + $horas_festivas * 13830;
    
    
    if ($salario_base < 1500000) {
        $salario_total += 162000;
    }
    
   
    $salario_total += $bono;
    
    return $salario_total;
}


function calcularDescuentos($salario_base) {
    $pension = $salario_base * 0.04; 
    $salud = $salario_base * 0.04; 
    $descuentos = $pension + $salud;
    return $descuentos;
}


$salario_base = calcularSalarioBase($conn, $cedula);
$salario_total = calcularSalarioTotal($salario_base, $horas_extras, $horas_nocturnas, $horas_festivas, $bono);
$descuentos = calcularDescuentos($salario_base);


$salario_neto = $salario_total - $descuentos;


echo "Salario base: $salario_base <br>";

echo "Descuento: $descuentos <br>";
echo "Salario neto: $salario_neto";






?>


