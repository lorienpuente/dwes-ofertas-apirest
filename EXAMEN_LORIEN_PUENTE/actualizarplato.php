<?php
include_once 'nav.php';
include 'platos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    include 'bd.php';
    $nombre = $_GET['nombre'];
    $sql = 'SELECT * FROM platos WHERE nombre = ' .$nombre;
    $stmt = $conector->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $plato = new platos($results[0]['nombre'], $results[0]['precio']);
    //Falla el php ya que al comentarlo aparece el formulario de html
    ?>
    
    
    <h1>Actualizar plato</h1>
    <form action="updateplato.php" method="POST">
        <label>Nombre: <?php echo $plato->nombre; ?></label>
        <label>Precio(€):</label>
        <input type="number" name="precio" step="0.01" value ="<?php echo $plato->precio; ?>">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>