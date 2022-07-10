<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

for ($contador = 1; $contador <= 100; $contador++) {
    echo $contador . "<br>";
}

for($contador=2; $contador <=100; $contador+=2) { 
    echo $contador. "<br>";

if ($contador== 60){
    break;
}
}
?>

