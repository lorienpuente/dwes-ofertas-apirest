<?php
include 'bd.php';
include 'platos.php';

$precio = $_POST['precio'];
$nombre = $_POST['nombre'];

$plato = new platos($nombre, $precio);

$sql = "UPDATE jugadores SET precio = :precio WHERE nombre = :nombre";
$stmt = $conector->prepare($sql);
$stmt->execute([$plato->nombre, $plato->precio]);

header("Location: index.php");
?>