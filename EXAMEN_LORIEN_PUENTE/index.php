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
        
    <h1>Mesas</h1>
    <?php
        $query = 'SELECT * FROM mesas';
        $stmt = $conector->query($query);
        $mesas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($mesas as $mesa) {
    
                echo '<form action="mesa.php" method="POST">';
                echo '<input type="hidden" name="dorsal" value="' . $mesa['id'] . '">';
                echo '<button type="submit"> Mesa ' . $mesa['id'] .'</button>';
                echo '</form>';
         
        }
        ?>
    <h1>Platos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php
            
            $sql = "SELECT nombre, precio FROM platos";
            $resultado = $conector->query($sql);
            $platos = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($platos as $plato) {
                echo "<tr>";
                echo "<td>" . $plato['nombre'] . "</td>";
                echo "<td>" . $plato['precio'] . "</td>";
                echo "<td>
                        <form action='actualizarplato.php' method='GET'>
                        <input type='hidden' name='acciones' value='{$plato['nombre']}'>
                        <button type='submit'>Modificar plato</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>