<?php

require_once  "nav.php";

require_once __DIR__ . "/dao/DAOFactory.php";
require_once __DIR__ . "/entities/Tarea.php";
$dao = DAOFactory::getDAOTareas();
$id = $_POST['id'];
$borrar = $dao->eliminar($id);

header("Location: index.php");
?>