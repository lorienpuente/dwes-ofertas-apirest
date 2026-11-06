<?php
include 'nav.php';
include 'bd.php';

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$plato = new platos($nombre, $cantidad);

$sql = "UPDATE platos SET (cantidad = ? + 1) WHERE nombre = ?";
$stmt = $conector->prepare($sql);
$stmt->execute([$plato->cantidad, $plato->nombre]);

header("Location: mesa.php");
//Sigo teniendo fallo ya que no llega a ejecutar el header("Location: mesa.php")
?>
