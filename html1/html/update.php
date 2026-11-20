<?php

require_once  "nav.php";

require_once __DIR__ . "/dao/DAOFactory.php";
require_once __DIR__ . "/entities/Tarea.php";
$dao = DAOFactory::getDAOTareas();
$id = (int)$_GET['id'];
$titulo = $_GET['titulo'];
$descripcion = $_GET['descripcion'];
$tarea = new Tarea($id ,$titulo, $descripcion);
$editar = $dao->actualizar($id, $tarea);

header("Location: index.php");
?>