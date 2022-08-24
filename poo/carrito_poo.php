<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definicion de clases 

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;

    public function __get ($propiedad){
        return $this->$propiedad;
    }
    public function __set ($propiedad, $valor){
        return $this->$propiedad = $valor;
    }

    public function __construct(){
        $this->descuento = 0.0;
    }

    public function imprimir(){
        echo "Dni: ". $this->dni . "<br>";
        echo "Nombre: ". $this->nombre . "<br>";
        echo "Correo: ". $this->correo . "<br>";
        echo "Telefono: ". $this->telefono . "<br>";
        echo "Descuento: ". $this->descuento . "<br><br>";
    }
}

class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __get ($propiedad){
        return $this->$propiedad;
    }
    public function __set ($propiedad, $valor){
        return $this->$propiedad = $valor;
    }

    public function __construct(){
        $this->precio = 0.0;
        $this->iva = 0.0;
    }
    public function imprimir (){
        echo "Cod: ". $this->cod . "<br>";
        echo "Nombre: ". $this->nombre . "<br>";
        echo "Precio: ". $this->precio . "<br>";
        echo "Descripcion: ". $this->descripcion . "<br>";
        echo "Iva: ". $this->iva . "<br><br>";
    }
}

class Carrito{
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;

    public function __get ($propiedad){
        return $this->$propiedad;
    }
    public function __set ($propiedad, $valor){
        return $this->$propiedad = $valor;
    }

    public function __construct()
    {
       $this->aProductos = array(); 
       $this->subTotal = 0.0;
       $this->total = 0.0;
    }
    public function cargarProducto($producto){
        $this->aProductos[] = $producto;
    }
    public function imprimirTicket (){
        echo "<table class='table table-hover border'>";
        echo "<tr><th col='2' class='text-center'>ECO MARKET</th></tr>
              <tr>
                <th>Fecha</th>
                <td>" . date("d/m/Y H:i:s") . "</td>
              </tr>
              <tr>
                <th>DNI</th>
                <td>" . $this->cliente->dni . "</td>
              </tr>
              <tr>
                <th>Nombre</th>
                <td>" . $this->cliente->nombre . "</td>
              </tr>
              <tr>
                <th col='2'>Productos:</th>
              </tr>";
              foreach ($this->aProductos as $producto) {
                echo "<tr>
                            <td>" . $producto->nombre . "</td>
                            <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                        </tr>";
                $this->subTotal += $producto->precio;
                $this->total += $producto->precio * (($producto->iva / 100)+1);
              }
             
        echo "<tr>
                <th>Subtotal s/IVA:</th>
                <td>$ " . number_format($this->subTotal, 2, ",", ".") . "</td>
              </tr>
            <tr>
                <th>TOTAL:</th>
                <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
              </tr>
        </table>";
    }
}

//Programa

$cliente1 = new Cliente();
$cliente1 ->dni ="33675986";
$cliente1 ->nombre ="Lola";
$cliente1 ->correo ="Lola5564@gmail.com";
$cliente1 ->telefono ="1134665372";
$cliente1 ->descuento ="0.05";
$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "V143000";
$producto1->nombre = "Notebook Dell Vostro";
$producto1->precio = "150.000";
$producto1->descripcion = "Computadora de escritorio Dell";
$producto1->iva ="21";
$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "KJ99860";
$producto2->nombre = "Smart tv Noblex";
$producto2->precio = "130.000";
$producto2->descripcion = "Televisor 55 pulgadas 4k UHD";
$producto2->iva ="10.5";
$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
$carrito->imprimirTicket(); //imprime ticket de compra

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </div>
</body>
</html>
