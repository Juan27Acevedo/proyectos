<?php
// archivo app.php

// incluir el archivo de conexión
include '../app/conexion/conexion.php';

// función para obtener los empleados
function obtenerEmpleados($conn) {
    // consulta SQL para obtener los datos requeridos
    $sql = "SELECT idempleado, nombre, apellido FROM empleado";
    $result = $conn->query($sql);

    // verificar si hay resultados
    if ($result->num_rows > 0) {
        $options = ""; // variable para almacenar las opciones del select

        // iterar sobre los resultados y construir las opciones
        while ($row = $result->fetch_assoc()) {
            $id = $row['idempleado'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            
            // agregar la opción al string $options
            $options .= "<option value='$id'>$nombre $apellido</option>";
        }

        // retornar las opciones del select
        return $options;
    } else {
        return "<option value=''>No hay empleados disponibles</option>";
    }
}

// llamada a la función para obtener las opciones del select
$options = obtenerEmpleados($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Nómina</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <form action="../app/controllers/calcularnomina.php" name="nomina" id="nomina" method="POST">
        <h1>Nómina del Empleado</h1>
        
        <!-- Select para elegir el empleado -->
        <label for="idempleado">Empleado</label>
        <select id="idempleado" name="idempleado">
            <?php echo $options; ?>
        </select>
        
        
        <br>
        
        <label for="mes">Mes de Nómina</label>
        <br>
        <input type="month" id="mes" name="mes" >
        <br>
        
        <br>
        
        <label for="horasextras">Horas Extras</label>
        <input type="number" id="horasextras" name="horasextras" placeholder="Horas Extras" >
        <br>
        
        <label for="horasnocturnas">Horas Nocturnas</label>
        <input type="number" id="horasnocturnas" name="horasnocturnas" placeholder="Horas Nocturnas" >
        <label for="salario">Salario</label>
        <input type="number" id="salario" name="salario" placeholder="salio" >
        <br>
        
        <label for="festivos">Festivos</label>
        <input type="number" id="festivos" name="festivos" placeholder="Festivos" >
        <br>

        
        <label for="bono">Bono</label>
        <input type="text" id="bono" name="bono" placeholder="Bonos" >
        <br>

        
        <input type="submit" name="calcular" value="Calcular" id="calcular">
       
        
    </form>
            <form action="../index.php">
               <input type="submit" value="Regresar" >
            </form>
</body>
</html>
