<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Preguntar si existe el archivo
if(file_exists("archivo.txt")){
    //Vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //Convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);

} else {
//Si no existe el archivo
    //Creamos un aClientes inicializado como un array vació
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if($pos>=0){
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
            //Eliminar la imagen anterior
            if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos]["imagen"])){
                unlink("imagenes/".$aClientes[$pos]["imagen"]);
            } 
        } else {
            //Mantener el nombreImagen que teniamos antes
            $nombreImagen = $aClientes[$pos]["imagen"];
        }
        //Actualizar
        $aClientes[$pos] = array("dni" => $dni,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $nombreImagen);

    } else {
        if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }
        //Insertar
        $aClientes[] = array("dni" => $dni,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $nombreImagen);
    }

    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
   //Eliminar del array aClientes la posición a borrar unset()
    unset($aClientes[$pos]);

    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="css/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
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
                <input type="text" name="txtDni" id="txtDni" class="form-control" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["dni"]: ""; ?>">
                </div>
                <div>
                    <label for="">Nombre: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]: ""; ?>">
                </div>
                <div>
                    <label for="">Telefono:</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]: ""; ?>">
                </div>
                <div>
                <label for="">Correo: *</label>
                <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]: ""; ?>">
            </div>
            <div>
            <label for="">Archivo Adjunto</label>
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
                    <?php foreach ($aClientes as $pos => $cliente): ?>
                <tr>
                <td>
                            <?php if($cliente["imagen"] != ""): ?> 
                                <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $cliente["dni"]?></td>
                        <td><?php echo $cliente["nombre"]?></td>
                        <td><?php echo $cliente["correo"]?></td>
                        <td>
                            <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="fa-solid fa-pencil"></i></a>
                            <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                 </tr>
                 <?php endforeach; ?>
            </table>
            </div>
        </div>
    </main>


</body>
</html>