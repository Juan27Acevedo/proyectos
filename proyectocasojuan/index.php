
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <div class="container">
        <form action="app/controllers/mantenimiento.php" method="POST" name="formulario" id="formulario" >
            <h1 class="usuarios">Ingresar Empleado</h1>
            <div class="prueba">
                <label for="idempleado">Cedula</label>
                <input type="number" id="idempleado" name="idempleado" placeholder="Cedula">
            </div>
            <input type="submit" name="validar" value="validar" id="validar">
            <br>
            <label for="nombre">Nombres</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
            <br>
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido">
            <br>
            <label for="telefono">Telefono</label>
            <input type="number" id="telefono" name="telefono" placeholder="Telefono">
            <br>
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" placeholder="Correo@">
            <br>
            <label for="direccion">Direccion</label>
            <input type="text" id="direccion" name="direccion" placeholder="Direccion">
            <br>
            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" name="cargo" placeholder="Cargo">
            <br>
            <br>
            <input type="submit" name="agregar" value="agregar" id="agregar">
            <input type="submit" name="archivo" value="archivo" id="archivo">
            <input type="submit" name="eliminar" value="eliminar" id="eliminar" '>
            <input type="submit" name="editar" value="editar" id="editar">
            <input type="submit" name="nomina" value="nomina" id="nomina">
            <br>
            <br>
            <input type="submit" name="administracion" value="administracion" id="administracion">
            <br>  
            <br>
           
            <br>
        </form>
        <div class="izq">
            <div class="overflow">
                <table>
                    <h1>Registro de Usuarios</h1>
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Archivo</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Direccion</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'app/conexion/conexion.php';
                        $sql = "SELECT * FROM empleado";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["idempleado"] . "</td>";
                                echo "<td>" . $row["archivo"] . "</td>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["apellido"] . "</td>";
                                echo "<td>" . $row["telefono"] . "</td>";
                                echo "<td>" . $row["correo"] . "</td>";
                                echo "<td>" . $row["direccion"] . "</td>";
                                echo "<td>" . $row["cargo"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


