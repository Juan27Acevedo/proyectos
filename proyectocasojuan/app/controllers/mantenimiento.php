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
    
    
    
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['validar'])){
$sql_existencia = "SELECT idempleado FROM empleado WHERE idempleado = '$cedula'";
    $result_existencia = $conn->query($sql_existencia);

    if ($result_existencia->num_rows > 0) {
        echo "<script>alert('Usuario Con la Cedula $cedula ya esta registrado'); window.location.href='../../public/index.php';</script>";
        if(isset($_POST['idempleado'])) {
            // Sanitizar la entrada para evitar inyección de SQL (seguridad)
            $cedula = mysqli_real_escape_string($conn, $_POST['idempleado']);
        
            // Consulta SQL para obtener los datos del empleado por su cédula
            $sql = "SELECT * FROM empleado WHERE idempleado = '$cedula'";
            $result = $conn->query($sql);
        
           
      // header('location:validarcedula.php');
    } else {
        
           echo "<script>alert('Usuario Con la Cedula $cedula no se encuenta registrado'); window.location.href='../../public';</script>";
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['agregar'])) {


    $sql= "SELECT idempleado FROM empleado WHERE idempleado=$cedula";
    $result= mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
    
        echo "<script>alert('Ya se encuentra usuario con la cedula $cedula '); window.location.href='../../public';</script>";
  
}else{
    
    $sql = "INSERT INTO empleado (idempleado, nombre, apellido, telefono, correo, direccion, cargo, salario)
            VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$correo', '$direccion', '$cargo', '$salario')";
}
    if (mysqli_query($conn, $sql)) {
        echo "Datos del empleado insertados correctamente.<br>";
    } else {
        echo "Error al insertar datos del empleado: " . mysqli_error($conexion) . "<br>";
    }

    if (isset($_FILES["archivo"])) {
        // Definir la carpeta de destino
        $carpeta_destino = "../app/include/files/";

        // Obtener el nombre y la extensión del archivo
        $nombre_archivo = basename($_FILES["archivo"]["name"]);
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        // Validar la extensión del archivo
        if (in_array($extension, array("pdf", "doc", "docx"))) {
            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                // Insertar la información del archivo en la base de datos
                $archivo_insertar = mysqli_real_escape_string($conexion, $nombre_archivo);
                $sql_archivo = "UPDATE empleado SET archivo='$archivo_insertar' WHERE idempleado='$cedula'";

                if (mysqli_query($conexion, $sql_archivo)) {
                    echo "Archivo subido y registrado en la base de datos correctamente.";
                } else {
                    echo "Error al registrar el archivo en la base de datos: " . mysqli_error($conexion);
                }
            } else {
                echo "Error al mover el archivo a la carpeta de destino.";
            }
        } else {
            echo "La extensión del archivo no es válida. Solo se permiten archivos PDF, DOC y DOCX.";
        }
    } else {
        echo "No se ha seleccionado ningún archivo.";
    }
}

       
      
       



    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminar'])){
        echo "<script>confir('desea elimar'); window.location.href='../../public';</script>";
        
        $sql = "DELETE FROM `empleado` WHERE idempleado = $cedula ";


        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Usuario Eliminado con exito con Exito'); window.location.href='../../public';</script>";
            

           
        }else{
            echo "error al agregar usuario" .$conn->error;

        }
        
    }
  


    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editar'])){

        //$sql="UPDATE empleado SET `nombre`='$nombre',`apellido`='$apellido',`direccion`='$direccion',`telefono`='$telefono',`correo`='$correo',`cargo`='$cargo',`salario`='$salario' WHERE idempleado=$cedula";
        //if ($conn->query($sql) === TRUE) {
           // echo "<script>alert('Usuario Editado con Exito'); window.location.href='../../public';</script>";
            
           header('location:../../public/editar.php');
           
        }
           

        
   


    

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['nomina'])){
        
       //echo 
       header('location:../../public/nomina.php');


        
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['administracion'])){
        
        //echo 
        header('location:../../public/administracion.php');
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
        // Definir la carpeta de destino
        $carpeta_destino = "../app/include/files/";
    
        // Obtener el nombre y la extensión del archivo
        $nombre_archivo = basename($_FILES["archivo"]["name"]);
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
    
        // Validar la extensión del archivo
        if (in_array($extension, array("pdf", "doc", "docx"))) {
            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                // Insertar la información del archivo en la base de datos
                include "db.php"; // Asumiendo que este archivo contiene la conexión a la base de datos
                $archivo_insertar = mysqli_real_escape_string($conexion, $nombre_archivo);
                $sql = "INSERT INTO empleado (archivo) VALUES ('$archivo_insertar')";
                $resultado = mysqli_query($conexion, $sql);
    
                if ($resultado) {
                    echo "Archivo subido y registrado en la base de datos correctamente.";
                } else {
                    echo "Error al registrar el archivo en la base de datos.";
                }
            } else {
                echo "Error al mover el archivo a la carpeta de destino.";
            }
        } else {
            echo "La extensión del archivo no es válida. Solo se permiten archivos PDF, DOC y DOCX.";
        }
    }


   
?>
