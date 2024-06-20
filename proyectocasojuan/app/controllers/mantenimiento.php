
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
   
    
    
    
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['validar'])) {
        // Sanitizar la entrada para evitar inyección de SQL (seguridad)
        $cedula = mysqli_real_escape_string($conn, $_POST['idempleado']);
    
        // Consulta SQL para verificar si el usuario está registrado
        $sql_existencia = "SELECT idempleado FROM empleado WHERE idempleado = '$cedula'";
        $result_existencia = $conn->query($sql_existencia);
    
        if ($result_existencia->num_rows > 0) {
            // Usuario registrado, mostrar mensaje
            echo "<script>alert('Usuario Con la Cedula $cedula ya está registrado'); window.location.href='../../index.php';</script>";
        } else {
            // Usuario no registrado, mostrar mensaje
            echo "<script>alert('Usuario Con la Cedula $cedula no se encuentra registrado'); window.location.href='../../index.php';</script>";
        }
    }


            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['agregar'])) {

                if($cedula){
                $sql= "SELECT idempleado FROM empleado WHERE idempleado=$cedula";
                $result= mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0){
                
                    echo "<script>alert('Ya se encuentra usuario con la cedula $cedula '); window.location.href='../../index.php';</script>";
            
                }else{
                
                $sql = "INSERT INTO empleado (idempleado, nombre, apellido, telefono, correo, direccion, cargo)
                        VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$correo', '$direccion', '$cargo')";
                }   
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Usuario Agregado con exito con Exito'); window.location.href='../../index.php';</script>";
                } else {
                    echo "Error al insertar datos del empleado: " . mysqli_error($conexion) . "<br>";
                }
            }else{
                echo "<script>alert('funcion invalida'); window.location.href='../../index.php';</script>";
            } 
            }   




//prueba de agregar archivo


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['archivo'])) {
        
    header('Location: ../../public/subirarchivo.php');
    
}



       
      
       



    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminar'])){
        echo "<script>confir('desea elimar'); window.location.href='../../index.php';</script>";
        if($cedula){
            $sql = "DELETE FROM `empleado` WHERE idempleado = $cedula ";


            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Usuario Eliminado con exito con Exito'); window.location.href='../../index.php';</script>";
                

            
            }else{
                echo "error al agregar usuario" .$conn->error;

            }
        }else{
            echo "<script>alert('funcion invalida'); window.location.href='../../index.php';</script>";
        }
        
    }
  


    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['editar'])) {
        
        header('Location: ../../public/editar.php');
        
    }
   


    

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['nomina'])){
        
       //echo 
       header('location:../../public/nomina.php');


        
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['administracion'])){
        
        //echo 
        header('location:../../public/administracion.php');
    }




   
?>