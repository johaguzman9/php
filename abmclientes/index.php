<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST){
    $dni = trim ($_POST["txtDni"]);
    $nombre = trim ($_POST["txtNombre"]);
    $telefono = trim ($_POST["txtTelefono"]);
    $correo = trim ($_POST["txtCorreo"]);

$aClientes[] = array("dni" => $dni,
                    "nombre" => $nombre,
                    "telefono" => $telefono,
                     "correo" => $correo);              
                                

//convertir el array de clientes en jsonClientes
$jsonClientes = json_encode($aClientes);

//almacenar el estring jsonClientes en el "archivo.txt"
file_put_contents("archivo.txt", $jsonClientes);
}
//preguntar si el archivo existe
if(file_exists("archivo.txt")){
    //vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);
}else{
    //si no existe el archivo
    //creamos un aClientes inicializando un array vacio 
    $aClientes = array ();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome6/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome6/css/fontawesome.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
            <form method="POST" action="" enctype="multipart/form-data">
            <div>
                <label for="">DNI: *</label>
                <input type="text" name="txtDni" id="txtDni" class="form-control" require value="">
                </div>
                <div>
                    <label for="">Nombre: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" require value="">
                </div>
                <div>
                    <label for="">Telefono:</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" require value="">
                </div>
                <div>
                <label for="">Correo: *</label>
                <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" require value="">
            </div>
            <div>
            <label for="">Archivo Adjunto></label>
            <input type="file" name="archivo" id="archivo" accept=".jpg, .jepg, .png" class="form-control">
            <small class="d-block">Archivos admitidos: .jpg, .jepg, .png</small>
            </div>
            <div>
            <button class="btn btn-primary" name="btnEnviar" type="submit">GUARDAR</button>
            <a href="index.php"></a> <button class="btn btn-danger" name="btnNuevo" type="danger">NUEVO</button> 
        </div>
            </form>
            </div>
            <div class="col-6">
            <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($aClientes as $cliente): ?>
                <tr>
                        <td></td>
                        <td><?php echo $cliente["dni"]?></td>
                        <td><?php echo $cliente["nombre"]?></td>
                        <td><?php echo $cliente["correo"]?></td>
                        <td>
                        <a href=""><i class="fa-solid fa-pencil"></i></a>
                        <a href=""><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                 </tr>
                 <?php endforeach; ?>
            </table>
            </div>
        </div>
    </main>


</body>
</html>