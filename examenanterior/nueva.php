<?php
    include 'nav.php';
    include 'prenda.php'; 
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
    <h2>Nueva prenda</h2>
    <form action="guardar.php" method="post">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" required> <br>
        <label for="tipo">Tipo de prenda:</label>
        <select name="tipo" id="tipo" required>
            <?php
                
                foreach (tipoPrenda::cases() as $prenda) {
                echo "<option value='" . $prenda->value . "'>" . $prenda->value . "</option>";
}
            ?>
        </select>
        <input type="submit" value="Agregar prenda">
    </form>
</body>
</html>