<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir PDF</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <form action="../app/controllers/archivo.php" method="post" enctype="multipart/form-data">
        <label for="idempleado">ID Empleado:</label>
        <input type="text" name="idempleado" id="idempleado" required>
        <br><br>
        <label for="file">Selecciona el archivo PDF:</label>
        <input type="file" name="file" id="file" accept=".pdf" required>
        <br><br>
        <input type="submit" value="Subir PDF">
    </form>
</body>
</html>
