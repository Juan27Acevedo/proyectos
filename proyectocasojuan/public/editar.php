<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="izq">
        <div class="overflow">
            <table>
                <H1>Actualizar Usuarios</H1>
                <tr>
                    <th>Cedula</th>
                    <th>archivo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
                
                <?php
                // Conexión a la base de datos
                $conn = new mysqli('localhost', 'root', '', 'papeleria');
                
                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }
                
                // Consulta SQL
                $sql = "SELECT * FROM `empleado`";
                $result = $conn->query($sql);
                
                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    while ($empleado = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='table__item'>" . $empleado["idempleado"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["archivo"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["nombre"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["apellido"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["telefono"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["correo"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["direccion"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["cargo"] . "</td>";
                        echo "<td class='table__item'>" . $empleado["salario"] . "</td>";
                        echo "<td class='table__item'><a href='../app/controllers/actualizar.php?id=" . $empleado["idempleado"] . "' class='table__item_link'>Editar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
                }
                
                // Liberar el conjunto de resultados y cerrar la conexión
                $result->free();
                $conn->close();
                ?>          
            </table>
        </div>
    </div>
</body>
</html>
