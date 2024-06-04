<?php
    session_start();
    include '../conexion/conexion.php';

    $cedula = $_POST['idempleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $artivo= $_POST['archivo'];




        $sql="UPDATE empleado SET `nombre`='$nombre',`apellido`='$apellido',`direccion`='$direccion',`telefono`='$telefono',
        `correo`='$correo',`cargo`='$cargo',`salario`='$salario' WHERE idempleado=$cedula";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Usuario Editado con Exito'); window.location.href='../../public/index.php';</script>";
            //echo "holaaaaaaaaaaaa";
        
           
        
    }else{
        echo "erorrrrrrrrrrrr";
    }
    $resultado = mysqli_query($conn,$sql)
?>