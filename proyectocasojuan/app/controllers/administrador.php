<?php
session_start();
include '../conexion/conexion.php';

$he = $_POST['horasextras'];
$hn = $_POST['horasnocturnas'];
$festivos = $_POST['festivos'];
$atr=$_POST['atr'];
$desp=$_POST['descuentopension'];
$desa=$_POST['descuentosalud'];

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['enviar'])){
$sql= "INSERT INTO administracion (horasextras, horasnocturnas, festivos, atr, descuentopension, descuentosalud)
 VALUES ('$he', '$hn', '$festivos', '$atr', '$desp', '$desa')";

    if($conn->query($sql)===true){
        
        header('location:../../public/administracion.php');
    }else{
        echo "Error al guardar los datos";
    }
}

if($_SERVER['REQUEST_METHOD'] == "POTS" and isset($_POST['inicio'])){

    header('location:../public/index.php');
}

?>