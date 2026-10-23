<?php
include 'bd.php';

$marca = $_POST['marca'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO prendas (marca, tipoPrenda) VALUES ('$marca', '$tipo')";

$conector->query($sql);

header("Location: prendas.php");
?>