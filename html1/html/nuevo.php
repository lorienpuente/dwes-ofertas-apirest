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
?>
<h1>Nueva tarea</h1>
    <form action="guardar.php" method="POST">
        <label>Titulo:</label>
        <input type="text" name="titulo" required>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" required>
        <button type="submit">Crear</button>
    </form>
</body>
</html>



