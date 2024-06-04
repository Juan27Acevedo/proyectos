<?php 
include '../conexion/conexion.php';
$cedula = $_GET['id']; // Asegúrate de que la clave es 'id' como en el enlace

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        .form-item {
            margin-bottom: 15px;
        }
        .form-item label {
            display: block;
            margin-bottom: 5px;
        }
        .form-item input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-item button {
            padding: 10px 15px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
        .input#celda{

        }
    </style>
</head>
<body>
    <div class="izq">
        <div class="overflow">
            <h1>Actualizar Usuario</h1>
            <form action="proceso_actualizar.php" method="POST">

            
                
                <?php
                // Conexión a la base de datos
                $conn = new mysqli('localhost', 'root', '', 'papeleria');
                
                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }
                
                // Consulta SQL
                $sql = "SELECT * FROM `empleado` WHERE idempleado='$cedula'";
                $result = $conn->query($sql);
                
                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    while ($empleado = $result->fetch_assoc()) {
                        
                        echo "<div class='form-item'><label for='cedula'>Cédula</label><input type='text' id='cedula' name='cedula' value='" . $empleado["idempleado"] . "' readonly></div>";
                        echo "<div class='form-item'><label for='archivo'>Archivo</label><input type='text' id='archivo' name='archivo' value='" . $empleado["archivo"] . "'></div>";
                        echo "<div class='form-item'><label for='nombre'>Nombre</label><input type='text' id='nombre' name='nombre' value='" . $empleado["nombre"] . "'></div>";
                        echo "<div class='form-item'><label for='apellido'>Apellido</label><input type='text' id='apellido' name='apellido' value='" . $empleado["apellido"] . "'></div>";
                        echo "<div class='form-item'><label for='telefono'>Teléfono</label><input type='text' id='telefono' name='telefono' value='" . $empleado["telefono"] . "'></div>";
                        echo "<div class='form-item'><label for='correo'>Correo</label><input type='text' id='correo' name='correo' value='" . $empleado["correo"] . "'></div>";
                        echo "<div class='form-item'><label for='direccion'>Dirección</label><input type='text' id='direccion' name='direccion' value='" . $empleado["direccion"] . "'></div>";
                        echo "<div class='form-item'><label for='cargo'>Cargo</label><input type='text' id='cargo' name='cargo' value='" . $empleado["cargo"] . "'></div>";
                        echo "<div class='form-item'><label for='salario'>Salario</label><input type='text' id='salario' name='salario' value='" . $empleado["salario"] . "'></div>";
                        echo "<div class='form-item'><input type='hidden' name='idempleado' value='" . $empleado["idempleado"] . "'><button type='submit'>Guardar</button></div>";
                    }
                } else {
                    echo "<p>No se encontraron resultados</p>";
                }
                
                // Liberar el conjunto de resultados y cerrar la conexión
                $result->free();
                $conn->close();
                ?>          
            </form>
        </div>
    </div>
</body>
</html>



