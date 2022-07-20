<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function promediar ($aNumeros){
    $sumatoria = 0;
    foreach ($aNumeros as $numero) {
        $sumatoria = $sumatoria + $numero;
    }
    return $sumatoria / count($aNumeros);
}
$aAlumnos= array();
$aAlumnos[] = array("nombre"=> "Ana Valle",
"notas"=> array (7,8),
);
$aAlumnos[] = array ("nombre"=> "Bernabe Paz",
"notas"=> array (5,7),
);
$aAlumnos[]= array ("nombre"=> "Sebastian Aguirre",
"notas"=> array (6,9),
);
$aAlumnos[]= array("nombre"=> "Monica Ledezma",
"notas"=> array (8,9),
);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table table-hover border">
            <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                    </tr>
            </thead>
            <tbody>
                <?php 
                $promedioCurso= 0;
                $sumatoria= 0;
                foreach($aAlumnos as $alumno):
                    $promedio= promediar ("$alumno"["notas"]);
                    $sumatoria= $sumatoria + $promedio;
                    ?>
                <tr>
                <td><?php echo $alumno ["nombre"];?></td>
                <td><?php echo $alumno ["notas"][0];?></td>
                <td><?php echo $alumno ["notas"][1];?></td>
                <td><?php echo number_format($promedio, 2, ",", ".");?></td>
                </tr>
                <?php
                
                endforeach; 
                $promedioCurso = $sumatoria / count($aAlumnos); 
            
                ?>
            </tbody>
            </table>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
             <p>Promedio de la cursada: <?php echo number_format($promedioCurso, 2, ",", "."); ?> </p>
        </div>
    </main>
</body>
</html>