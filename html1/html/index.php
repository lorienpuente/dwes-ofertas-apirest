<?php

require_once __DIR__ . "/dao/DAOFactory.php";
require_once __DIR__ . "/entities/Tarea.php";
require_once  "nav.php";


$dao = DAOFactory::getDAOTareas();
$tareas = $dao->obtenerTodas();

echo '<h1> Lista de tareas </h1>';

echo '<ul>';

foreach ($tareas as $tarea) {
            
                echo '<li>';
                echo '<p>' . $tarea->id . '</p>';
                echo '<p>' . $tarea->titulo . '</p>';
                echo '<p>' . $tarea->descripcion . '</p>';
                echo '<form action="borrar.php" method="POST">';
                echo '<input type="hidden" name="nombre" value="' . $tarea->id . '">';
                echo '<button type="submit">Borrar</button>';
                echo '</form>';
                echo '<form action="editar.php" method="GET">';
                echo '<input type="hidden" name="nombre" value="' . $tarea->id . '">';
                echo '<button type="submit">Editar</button>';
                echo '</form>';
                echo '</li>';
        }

echo '</ul>';