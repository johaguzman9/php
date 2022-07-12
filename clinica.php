<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes=array();
$aPacientes[] = array("nombre" => "Ana Acuña",
    "dni" =>"33.765.012",
    "edad"=> "45",
    "peso"=> "81.5"
);
$aPacientes[] = array("nombre" => "Gonzalo Bustamante",
"dni" => "23.684.385",
"edad" => "66",
"peso" => "79"
);
$aPacientes[] = array("nombre" => "Juan Irraola",
"dni" => "23.684.385",
"edad" => "28",
"peso" => "79"     
);
$aPacientes[] = array("nombre" => "Beatriz Ocampo",
"dni" => "23.684.385",
"edad" => "50",
"peso" => "79"
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">"
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Listado de Pacientes</h1>
    </div>
    </div>
    <div class="row">
    <div class="col-12"> 
    <table class="table table-hover border">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre y Apellido</th>
            <th>Edad</th>
            <th>Peso</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($aPacientes as $paciente) { ?>
        <tr>
        <td><?php echo $paciente ["dni"]; ?></td>
        <td><?php echo $paciente ["nombre"]; ?></td>
        <td><?php echo $paciente["edad"]; ?></td>
        <td><?php echo $paciente ["peso"]; ?></td>
        </tr>
        <?php
        } ?>
    </tbody>
    </table>       
    </div>
    </main>
</body>

</html>