<?php
    include 'nav.php';
    include 'tipoprenda.php'; 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h4>Prendas</h4>
    <table>
        <tr>
            <th>Marca</th>
            <th>Tipo de prenda</th>
            <th>N. ejemplares</th>
        </tr>
        <?php
            include 'bd.php';
            $sql = "SELECT p.marca, p.tipoPrenda, COUNT(e.prenda) AS cantidad_tipos
                    FROM prendas p
                    LEFT JOIN ejemplares e ON p.marca = e.prenda
                    GROUP BY p.marca, p.tipoPrenda";
            $resultado = $conector->query($sql);
            $prendas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($prendas as $prenda) {
                echo "<tr>";
                echo "<td>" . $prenda['marca'] . "</td>";
                echo "<td>" . $prenda['tipoPrenda'] . "</td>";
                echo "<td>" . $prenda['cantidad_tipos'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    

</body>
</html>





