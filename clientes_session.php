<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_SESSION["listadoClientes"])){
    $aClientes = $_SESSION["listadoClientes"];
}else{
    $aClientes = array();
    
}

    if (isset($_POST["btnEnviar"])){

    $nombre = $_POST["txtNombre"];
    $dni= $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

    $aClientes[] = array("nombre"=> $nombre,
                        "dni"=> $dni,
                        "telefono"=> $telefono,
                        "edad"=> $edad
    );

    $_SESSION ["listadoClientes"] = $aClientes;
}

    if (isset($_POST["btnEliminar"])){
    session_destroy();
    $aClientes = array();
    header("Location: clientes_session.php");
}
if(isset($_GET["pos"])){
    $pos = $_GET["pos"];
    unset($aClientes[$pos]);
    //Actualizo l avariable de session con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                <form method="POST" action="">
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
                    <button class="btn btn-primary" name="btnEnviar" type="submit">ENVIAR</button>
                        <button class="btn btn-danger" name="btnEliminar" type="danger">ELIMINAR</button>
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
                        <th>Acciones</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($aClientes as $pos => $cliente): ?>
                <tr>
                    <td><?php echo $cliente ["nombre"]; ?></td>
                    <td><?php echo $cliente ["dni"]; ?></td>
                    <td><?php echo $cliente ["telefono"]; ?></td>
                    <td><?php echo $cliente ["edad"]; ?></td>
                    <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            </div>
        </div>
    </main>
</body>
</html>