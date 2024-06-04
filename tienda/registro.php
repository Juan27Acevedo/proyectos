<?php

$conexion = mysqli_connect("localhost", "root", "", "tienda_arte") or
die("Problemas con la conexión");

mysqli_query($conexion, "insert into registro_arte(nombre,apellido,documento) values 
                   ('$_REQUEST[nombre]','$_REQUEST[apellido]',$_REQUEST[documento])")
or die("Problemas en el select" . mysqli_error($conexion));

mysqli_close($conexion);

header('Location: index.html');;
?>






