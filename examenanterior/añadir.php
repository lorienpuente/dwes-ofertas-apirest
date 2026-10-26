<?php
include 'bd.php';

$tipo = $_POST['tipo'];
$color = $_POST['color'];
$talla = $_POST['talla'];
$stock = $_POST['stock'];

$sql = "INSERT INTO ejemplares (prenda, color, talla, stock) VALUES ('$tipo', '$color', '$talla', $stock)
ON DUPLICATE KEY UPDATE stock = '$stock'";

$conector->query($sql);

header("Location: prendas.php");
exit;
?>