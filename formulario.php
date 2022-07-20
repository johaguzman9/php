<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
if ($_POST){
    $usuario= $_POST ["txtUsuario"];
    $clave= $_POST ["txtClave"];
    if ($usuario == "" && $clave==""){
        header("Location: confirmado.php");
    }else{
        $msg= "Valido unicamente para usuarios registrados";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
<h1>Formulario Login</h1>
        </div>
        <div class="row">
            <div class="col-12">
            <?php if (isset($msg)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            <form action="" method="$_POST"></form>
    <div class="col-3 my-3">
<label for=""> Usuario </label>
<input type="txtUsuario" id="txtUsuario" name="txtusuario" class="form-control">
</div>
    <div class="col-3 my-3">
    <label for=""> Clave </label>
    <input type="password" id="txtClave" name="txtClave" class="form-control">
    </div>
    <div class="my-3">
    <button class="btn btn-primary" type="submit">ENVIAR</button>
    </div>
</form>
        </div>
    </div>
</body>
</html>


