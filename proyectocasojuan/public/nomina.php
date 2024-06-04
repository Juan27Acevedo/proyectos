<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <form action="../app/controllers/calcularnomina.php" name="nomina" id="nomina" method="POST">
            
        <h1 class="">Nomina Empleado</h1>
        <label for="">Cedula</label>
        <input type="number" id="idempleado" name="idempleado" placeholder="Cedula" >
        <input type="submit" value="validar">

        <br>
        <label for="">Salario</label>
       
        <br>
        
       
        <br>
        <label for="">Mes y año de Ingreso</label>
        <br>
        <input type="date" id="mes" name="mes" >
        <br>
      
        <br>
        <label for="">Dias Laborados</label>
        <input type="number" id="diaslaborados" name="diaslaborados" placeholder="Dias Laborados">
        <br>
        
        <br>
        <label for="">Horas Extras</label>
        <input type="number" id="horasextras" name="horasextras" placeholder="Horas Extras" >
        <br>
        <label for="">Horas Nocturnas</label>
        <input type="number" id="horasnocturnas" name="horasnocturnas" placeholder="Horas Nocturnas" >
        <br>
        <label for="">Festivos</label>
        <input type="number" id="festivos" name="festivos" placeholder="Festivos" >
        <br>
        <label for="">Bono</label>
        <input type="text" id="bono" name="bono" placeholder="Bonos">
        <label for="">sueldo Neto</label>
        <input type="text" id="sueldoneto" name="sueldoneto" placeholder="Sueldo Neto" >
        <br>

        <input type="submit" name="calcular" value="calcular" id="calcular">
        <a href="/public">
        <input type="submit" name="regresar" value="regresar" id="regresar">
        </a>
    </form>  


    

</body>
</html>