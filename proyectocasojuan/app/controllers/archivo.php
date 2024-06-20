<?php
session_start();
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idempleado = $_POST['idempleado'];
    $file = $_FILES['file'];

    // Verificar que el archivo sea un PDF
    if ($file['type'] == 'application/pdf') {
        // Definir la ruta absoluta de la carpeta "files"
        $target_dir = __DIR__ . '/../includes/files/';
        
        // Crear la carpeta "files" si no existe
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Ruta completa donde se guardará el archivo
        $file_path = $target_dir . basename($file['name']);

        // Mover el archivo a la carpeta "files"
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            // Ruta relativa para guardar en la base de datos
            $db_file_path = 'includes/files/' . basename($file['name']);

            // Actualizar la tabla de empleado con la ruta del archivo
            $sql = "UPDATE empleado SET archivo = '$db_file_path' WHERE idempleado = '$idempleado'";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('el archivo fue agregado con exito al usuario: $cedula'); window.location.href='../../index.php';</script>";
            } else {
                echo "Error actualizando el registro: " . $conn->error;
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Por favor, sube un archivo PDF.";
    }
}

$conn->close();
?>
