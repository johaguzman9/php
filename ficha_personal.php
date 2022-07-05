<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha= date ("d/m/Y");
$nombre = "Johannys Guzman";
$edad = 28;
$aPeliculas = array("Diario de una pasion", "Up", "El diablo se viste a la moda");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
</head>
<body>
<main class=container>
<div class="row">
    <div class="col-12 text-center py-5">
        <h1>Ficha Personal</h1>
</div>
</div>
<div class="row">
    <div class="col-12">
    <table class="table table-hover border">
        <tbody>
        <tr>
            <th>Fecha</th>
            <td><?php echo$fecha; ?></td>
        </tr>
        <tr>
            <th>Nombre y Apellido:</th>
            <td><?php echo$nombre; ?></td>
        </tr>
        <tr>
            <th>Edad:</th>
            <td><?php echo$edad; ?></td>
        </tr>
        <tr>
            <th>Peliculas Favoritas:</th>
            <td><?php echo$aPeliculas[0]; ?><br>
            <?php echo$aPeliculas[1];?><br>
            <?php echo$aPeliculas[2]; ?>
            </td>
        </tr>
        </tbody>
</table>
    </div>
</div>
    </main>
</body>
</html>