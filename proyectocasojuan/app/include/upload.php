<?php
session_start();
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    // Definir la carpeta de destino
    $carpeta_destino = "../include/files/";

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
