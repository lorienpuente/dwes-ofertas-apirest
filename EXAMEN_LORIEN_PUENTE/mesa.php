<?php
include_once 'nav.php';
include 'bd.php';
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
    $id = $_POST['id'];

    $sql = 'SELECT * FROM mesas WHERE id = ?';
    $stmt = $conector->prepare($sql);
    $stmt->execute([$id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <h1>Mesa <?php echo $results[0]['id']; ?></h1>

    <form action="limpiar.php" method="POST">
    <button type="submit">Limpiar mesa</button>
    </form>
    <p>Platos disponibles: </p>

    <?php
        $query = 'SELECT * FROM platos';
        $stmt = $conector->query($query);
        $platos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($platos as $plato) {
    
                echo '<form action="updatecantidad.php" method="POST">';
                echo '<input type="hidden" name="dorsal" value="' . $plato['nombre'] . '">';
                echo '<button type="submit">' . $plato['nombre'] . '</button>';
                echo '</form>';

        }
        ?>
    <p>Pedidos: </p>
    <table>
        <tr>
            <th>Plato</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
        <?php
            
            foreach ($platos as $plato) {
                echo "<tr>";
                echo "<td>" . $plato['nombre'] . "</td>";
                echo "<td>" . $plato['cantidad'] . "</td>";
                echo "<td>" . $plato['precio'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <p>Coste total: </p>
</body>
</html>