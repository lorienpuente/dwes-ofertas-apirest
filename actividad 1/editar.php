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
    include 'plato.php';
    include 'bd.php';


    $nombre = $_GET['nombre'];
    $sql = 'SELECT * FROM platos WHERE nombre = "'.$nombre.'"';
    $stmt = $conector->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $plato = new Plato($results[0]['nombre'], $results[0]['precio'], $results[0]['tipo']);

    $sqlIng = 'SELECT nombre_ingrediente FROM plato_ingrediente WHERE nombre_plato = ?';
    $stmtIng = $conector->prepare($sqlIng);
    $stmtIng->execute([$plato->nombre]);
    $ingredientesSeleccionados = $stmtIng->fetchAll(PDO::FETCH_COLUMN);

    // Obtener todos los ingredientes disponibles desde la base de datos.
    // Cambia 'ingredientes' o 'nombre' si tu tabla/columna tienen otros nombres.
    $sqlTodosIng = 'SELECT nombre FROM ingredientes';
    $stmtTodosIng = $conector->query($sqlTodosIng);
    $ingredientes = $stmtTodosIng->fetchAll(PDO::FETCH_COLUMN);
    
    ?>
    <h1>Editar plato</h1>
    <form action="update.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value ="<?php echo $plato->nombre; ?>">
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" value ="<?php echo $plato->precio; ?>">
        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="Primer plato" <?php echo ($plato->tipo == 'Primer plato'); ?>>Primer plato</option>
            <option value="Segundo plato" <?php echo ($plato->tipo == 'Segundo plato'); ?>>Segundo plato</option>
            <option value="Postre" <?php echo ($plato->tipo == 'Postre'); ?>>Postre</option>
        </select>
        <p>Ingredientes</p>
        
        <?php foreach ($ingredientes as $ingrediente) { ?>
            <label>
                <input type="checkbox" name="ingredientes[]" value="<?php echo $ingrediente; ?>"
                    <?php echo in_array($ingrediente, $ingredientesSeleccionados) ? 'checked' : ''; ?>>
                <?php echo $ingrediente; ?>
            </label>
            <br>
        <?php } ?>

        <button type="submit">Actualizar</button>
    </form>

</body>
</html>
