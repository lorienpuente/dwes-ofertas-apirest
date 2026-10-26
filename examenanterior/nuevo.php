 <?php
    include 'bd.php';
    include 'nav.php';
    include 'tipoprenda.php';
    include 'ejemplar.php';
    include 'color.php';
    include 'talla.php';

    $sql = "SELECT marca, tipoPrenda FROM prendas";
    $resultado = $conector->query($sql);
    $prendas = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3>Nuevo ejemplar</h3>
   <form action="añadir.php" method="POST">
    <Label for="tipo">Tipo de prenda:</label>
    <select name="tipo" id="tipo" required>
            <?php
                
                foreach ($prendas as $prenda) {
                echo "<option value='" . $prenda['marca'] . "'>" . $prenda['marca'] . ' - ' . $prenda['tipoPrenda'] . "</option>";
}
            ?>
        </select><br>
    <label for="color">Color:</label>
    <select name="color" id="color" required>
            <?php
                
                foreach (color::cases() as $ejemplar) {
                echo "<option value='" . $ejemplar->value . "'>" . $ejemplar->value . "</option>";
}
            ?>
        </select><br>
    <label for="talla">Talla:</label>
    <select name="talla" id="talla" required>
            <?php
                
                foreach (talla::cases() as $ejemplar) {
                echo "<option value='" . $ejemplar->value . "'>" . $ejemplar->value . "</option>";
}
            ?>
        </select><br>
    <label for="stock">Stock:</label>
    <input type="number" placeholder="Añade un stock" name="stock" id="stock" required><br>
    <input type="submit" value="Agregar ejemplar">
   </form>
</body>
</html>