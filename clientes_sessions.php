<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_SESSION["ListadoClientes"])){
    $aClientes = $_SESSION["ListadoClientes"];
}else{
    $aClientes = array();
    
}
if ($_POST){
    $nombre = $_POST ["txtNombre"];
    $dni= $_POST ["txtDni"];
    $telefono = $_POST ["txtTelefono"];
    $edad = $_POST ["txtEdad"];

    $aClientes[]= array("nombre"=>$nombre,
                        "dni"=>$dni,
                        "telefono"=>$telefono,
                        "edad"=> $edad

);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form method="POST">
                    <div class="py-3">
                        <label for="">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Edad:</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="py-3">
                    <button class="btn btn-primary" type="submit">ENVIAR</button>
                        <button class="btn btn-danger" type="danger">ELIMINAR</button>
                    </div>
                    </div>
                </form>
            <div class="col-6 ms-5">
            <table class="table table-hover border">
            <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>DNI</th>
                        <th>TELEFONO</th>
                        <th>EDAD</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($aClientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente ["nombre"]; ?></td>
                    <td><?php echo $cliente ["dni"]; ?></td>
                    <td><?php echo $cliente ["telefono"]; ?></td>
                    <td><?php echo $cliente ["edad"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            </div>
        </div>
    </main>
</body>
</html>