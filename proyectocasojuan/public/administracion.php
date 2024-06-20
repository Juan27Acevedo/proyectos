<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <form action="../app/controllers/administrador.php" method="POST" name="admin" id="admin">
            <h2>Administracion</h2>
            
            <br>
            <label for="">Valor Horas Extras</label>
            <input type="number" id="horasextras" name="horasextras" placeholder="Horas Extras" >
            <br>
            <label for="">Valor Horas Nocturnas</label>
            <input type="number" id="horasnocturnas" name="horasnocturnas" placeholder="Horas Nocturnas" >
            <br>
            <label for="">Valor Dias Festivos</label>
            <input type="number" id="festivos" name="festivos" placeholder="Festivos" >
            <br>
            <label for="atr">Auxilio De Transporte</label>
            <input type="number" id="atr" name="atr" placeholder="Auxilio De Transporte">
            <br>
            <label for="">Descuento Pension</label>
        <input type="number" id="descuentopension" name="descuentopension" placeholder="Descuento Salud">
        <label for="">Descuento Salud</label>
        <input type="number" id="descuentosalud" name="descuentosalud" placeholder="Descuento Salud">

            <input type="submit" name="enviar" value="enviar" id="enviar">
        </form>
        <form action="../index.php">
    <input type="submit" value="Regresar" >
</form> 
    </div>

    

</body>
</html>