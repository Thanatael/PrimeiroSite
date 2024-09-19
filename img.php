<?php
$peso = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["peso"])) ? $_POST["peso"] : null;

$altura = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["altura"]))? $_POST["altura"] : null;

$resultado = 0;

if($peso && $altura){
    $resultado = $peso / ($altura * $altura);
}

var_dump($resultado);die;
?>