<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
require_once  "nav.php";
$id = $_GET['id'];
?>
<h1>Editar tarea</h1>
    <form action="update.php" method="GET">
        <input type="hidden" name="id" value =<?php echo $id ?>>
        <label>Titulo:</label>
        <input type="text" name="titulo" required>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" required>
        <button type="submit">Editar</button>
    </form>
</body>
</html>
