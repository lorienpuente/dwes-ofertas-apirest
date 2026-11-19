<?php
require_once  "nav.php";

require_once __DIR__ . "/dao/DAOFactory.php";
require_once __DIR__ . "/entities/Tarea.php";
$dao = DAOFactory::getDAOTareas();
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$tarea = new Tarea(null,$titulo, $descripcion);
$nuevo = $dao->crear($tarea);


?>