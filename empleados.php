<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados= array();
$aEmpleados[] = array ("dni"=> 33330675, "nombre"=>"David Garcia", "bruto"=> 85000.30);
$aEmpleados[] = array ("dni"=> 40765908, "nombre"=>"Ana Del Valle", "bruto"=> 90000);
$aEmpleados[] = array ("dni"=> 67324653, "nombre"=> "Andres Perez", "bruto"=>100000);
$aEmpleados[] = array ("dni"=> 75334092, "nombre"=> "Victoria Luz", "bruto"=>70000);
function calcularNeto ($bruto){
    return $bruto - ($bruto * 0.17);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">"
<main class=container>
    <div class="row">
        <div class="col-12 py-5 text-center"> 
            <h1>Listado de Empleados</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>NOMBRE</th>
                        <th>SUELDO</th>
                    </tr>
                    <tbody>
                    <?php
        foreach($aEmpleados as $empleado) { }?>  
                    <tr>
                        <td><?php echo $empleado ["dni"]?></td>
                        <td><?php echo mb_strtoupper $empleado ["nombre"]?></td>
                        <td><?php echo number_format(calcularNeto ($empleado ["bruto"],2, ",", ".")); ?></td>
                    </tr>   
                    </tbody>
                </thead>
            </table>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
             <p>Cantidad de empleados activos: <?php echo count ($aEmpleados); ?> </p>
        </div>
    </div>
</main>
</head>
<body>
    
</body>
</html>