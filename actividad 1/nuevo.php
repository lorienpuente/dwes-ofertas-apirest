<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'nav.php';
    include_once 'bd.php';

    // Obtener todos los ingredientes de la base de datos
    $sqlIng = 'SELECT nombre FROM ingredientes';
    $stmtIng = $conector->query($sqlIng);
    $ingredientes = $stmtIng->fetchAll(PDO::FETCH_COLUMN);
    ?>
    <h1>Nuevo plato</h1>
    <form action="guardar.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>
        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="Primer plato">Primer plato</option>
            <option value="Segundo plato">Segundo plato</option>
            <option value="Postre">Postre</option>
        </select>
        <p>Ingredientes</p>
       
        <?php foreach ($ingredientes as $ingrediente) { ?>
            <label>
                <input type="checkbox" name="ingredientes[]" value="<?php echo $ingrediente; ?>">
                <?php echo $ingrediente; ?>
            </label>
            <br>
        <?php } ?>
    
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
