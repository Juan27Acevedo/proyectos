
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/usuario.php">
    <link rel="stylesheet" href="../app/controllers/verificarcedula.php">
</head>
<body>

    <div class="container">
        
        <form action="../app/controllers/mantenimiento.php"  method="POST" name="formulario" id="formulario">

            <h1 class="usuarios">Ingresar Empleado</h1>

                <div class="prueba">
                <label for="idempleado">Cedula</label>
                <input type="number" id="idempleado" name="idempleado" placeholder="Cedula">
                </div>
                <input type="submit" name="validar" value="validar" id="validar">

                <br>
               
                <label for="">Nombres</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                <br>
                <label for="">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido">
                <br>
                <label for="">telefono</label>
                <input type="number" id="telefono" name="telefono" placeholder="Telefono" >
                <br>
                <label for="">Correo</label>
                <input type="email" id="correo" name="correo" placeholder="Correo@">
                <br>
                <label for="">Direccion</label>
                <input type="text" id="direccion" name="direccion" placeholder="Direccion">
                <br>
                <label for="">Cargo</label>
                <input type="text" id="cargo" name="cargo" placeholder="Cargo" >
                <br>
                <label for="">Salario</label>
                <input type="number" id="salario" name="salario" placeholder="Salario" >
                <br>
                <input type="submit" name="agregar" value="agregar" id="agregar">
                
                <input type="submit" name="eliminar" value="eliminar" id="eliminar" onclick='return confirmacion()'>

                <input type="submit" name="editar" value="editar" id="editar">


                
                <input type="submit" name="nomina" value="nomina" id="nomina">

                <input type="submit" name="administracion" value="administracion" id="administracion">


                <br>  
                <br>

                
                    
                


               

        </form>
       
        

            <div class="izq">
                <div class="overflow">
                    <table>

                        
                                <H1>Registro de Usuarios</H1>
                            
                                <th>Cedula</th>
                                <th>archivo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Cargo</th>
                                <th>Salario</th>
                               
                                
                                

                            
                            
                        
                        <tbody>
                            <?php
                                // Incluir el archivo de conexión
                                
                                include '../app/conexion/conexion.php';

                                // Consulta SQL para obtener clientes
                                $sql = "SELECT * FROM `empleado` WHERE 1";
                                $result = $conn->query($sql);
                            

                                    if ($result->num_rows > 0) {
                                    // Mostrar los datos de cada usuario en la tabla
                                    while ($conn= $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $conn["idempleado"] . "</td>";
                                        echo "<td>". $conn["archivo"]."</td>";
                                        echo "<td>" . $conn["nombre"] . "</td>";
                                        echo "<td>" . $conn["apellido"] . "</td>";
                                        echo "<td>" . $conn["telefono"] . "</td>";
                                        echo "<td>" . $conn["correo"] . "</td>";
                                        echo "<td>" . $conn["direccion"] . "</td>";
                                        echo "<td>" . $conn["cargo"] . "</td>";
                                        echo "<td>" . $conn["salario"] . "</td>";

                                    }
                                }
                             ?>
                        </tbody>
                    </table>
                </div>    
             </div>
    </div>




                    
        
<br>
<br>
<br>



</body>
</html>

