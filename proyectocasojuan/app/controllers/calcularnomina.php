<?php
session_start();
include '../conexion/conexion.php';

$cedula = $_POST['idempleado'];
$salarioBase = $_POST['salario'];
$horas_extras = $_POST['horasextras'];
$horas_nocturnas = $_POST['horasnocturnas']; 
$horas_festivas = $_POST['festivos'];
$bono = $_POST['bono'];


// Verificar si la cédula no está vacía
if ($cedula) {
    // Realizar la consulta para obtener el registro con el idadmin más alto
    $sql = "SELECT * FROM administracion ORDER BY idadmin DESC LIMIT 1";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        $administrador = $result->fetch_assoc();
        $idAdmin = $administrador["idadmin"];
        $extras = $administrador["horasextras"];
        $nocturnas = $administrador["horasnocturnas"];
        $festivos = $administrador["festivos"];
        $descuentopension = $administrador["descuentopension"];
        $descuentosalud = $administrador["descuentosalud"];
        $atr = $administrador["atr"];


        $calcularporcentajepension= $salarioBase*$descuentopension/100;
        $calcularporcentajesalud= $salarioBase*$descuentosalud/100;
        $descuentopenysal=$calcularporcentajepension+$calcularporcentajesalud;
        $salarioBasedescuento= $salarioBase-$descuentopenysal;
        $calcularHorasExtras = $horas_extras * $extras;
        $calcularHorasNocturnas = $horas_nocturnas * $nocturnas;
        $calcularHorasFestivos = $horas_festivas * $festivos;
        $calcularSalarioFinal = $calcularHorasExtras + $calcularHorasNocturnas + $calcularHorasFestivos + $bono +$salarioBasedescuento;

        $sql = "INSERT INTO nomina (salio_base, idempleado, idadmin, horasextras, horasnocturnas, festivos, bono, salario_neto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }

        $stmt->bind_param('diiiiidd', $salarioBasedescuento, $cedula, $idAdmin, $calcularHorasExtras, $calcularHorasNocturnas, $calcularHorasFestivos, $bono, $calcularSalarioFinal);
        $stmt->execute();

        if ($stmt->error) {
            echo "paila: " . $stmt->error;
        } else {
             
             }

        $stmt->close();
    } else {
        echo "No se encontraron resultados";
    }

    $conn->close();
} else {
    echo "Por favor, proporciona una cédula válida.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Nómina</title>
   
    <style>
        body{
            background:chocolate;
             font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
    
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            background:  darkgrey;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   <center> <h2>Resultado de la Nómina</h2></center>
    <table>
        <tr>
            <th>Descripción</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Horas Extras</td>
            <td><?php echo "$ $calcularHorasExtras"; ?></td>
        </tr>
        <tr>
            <td>Horas Nocturnas</td>
            <td><?php echo "$ $calcularHorasNocturnas"; ?></td>
        </tr>
        <tr>
            <td>Horas Festivas</td>
            <td><?php echo "$ $calcularHorasFestivos"; ?></td>
        </tr>
        <tr>
            <td>Bono</td>
            <td><?php echo "$ $bono "; ?></td>
        </tr>
        
        <tr>
            <td>Auxilio de Transporte</td>
            <td><?php echo "$ $atr";?></td>
        </tr>
        
        <tr>
            <td>Salario Final</td>
            <td><?php echo "$ $calcularSalarioFinal"; ?></td>
        </tr>
    </table>
            <form action="../../index.php">
               <input type="submit" value="Regresar" >
            </form>
</body>
</html>
