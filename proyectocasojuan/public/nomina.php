<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Nómina</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <form action="../app/controllers/calcularnomina.php" name="nomina" id="nomina" method="POST">
        <h1>Nómina del Empleado</h1>
        
        <label for="idempleado">Cedula</label>
        <input type="number" id="idempleado" name="idempleado" placeholder="Cedula" required>
        <input type="submit" value="Validar">

        <br>
        
        <label for="mes">Mes de Nómina</label>
        <br>
        <input type="month" id="mes" name="mes" required>
        <br>
        
        <br>
        
        <label for="horasextras">Horas Extras</label>
        <input type="number" id="horasextras" name="horasextras" placeholder="Horas Extras" required>
        <br>
        
        <label for="horasnocturnas">Horas Nocturnas</label>
        <input type="number" id="horasnocturnas" name="horasnocturnas" placeholder="Horas Nocturnas" required>
        <br>
        
        <label for="festivos">Festivos</label>
        <input type="number" id="festivos" name="festivos" placeholder="Festivos" required>
        <br>
        
        <label for="bono">Bono</label>
        <input type="text" id="bono" name="bono" placeholder="Bonos" required>
        <br>

        <input type="submit" name="calcular" value="Calcular" id="calcular">
        
        
        
    </form>
</body>
</html>
