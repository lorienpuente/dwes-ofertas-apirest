<?php

require_once __DIR__ . "/../dao/DAOFactory.php";
require_once __DIR__ . "/../entities/Tarea.php";

// Indica al cliente que la API recibe y devuelve JSON y permite peticiones desde otros orígenes.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Allow: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");


// Lee y valida el JSON del cuerpo para las operaciones de creación y actualización.
function leerTarea(): Tarea
{
    $datos = json_decode(file_get_contents("php://input"));
    $titulo = $datos->titulo ?? null;
    $descripcion = $datos->descripcion ?? null;
    return new Tarea(null, $titulo, $descripcion);
}

//capturo el método HTTP y el id de la tarea (si se pasa) para decidir qué operación realizar.
$metodo = $_SERVER["REQUEST_METHOD"];
$id = $_GET["id"] ?? null;


try {
    // El punto de entrada usa la interfaz del DAO y deja las consultas al componente MySQL.
    $dao = DAOFactory::getDAOTareas();

    switch ($metodo) {
        case "GET":
            //no es búsqueda, es un listado de todas las tareas o una tarea específica según si se pasa id o no.
            if ($id === null) {
                // Sin id, convierte cada entidad a un array que json_encode puede serializar.
                $tareas = $dao->obtenerTodas();
                echo json_encode($tareas);
                break;
            }
            // Con id, responde con la tarea o con un 404 si no existe.
            $tarea = $dao->obtenerPorId($id);
            echo json_encode($tarea);
            break;

        case "POST":
            // POST crea una nueva tarea 
            $tarea = $dao->crear(leerTarea());
            echo json_encode($tarea);
            break;

        case "PUT":
            // PUT reemplaza los campos editables de la tarea indicada.
            $tarea = $dao->actualizar($id, leerTarea());
            echo json_encode($tarea);
            break;

        case "DELETE":
            // El DAO indica si encontró y eliminó el registro.
            echo $dao->eliminar($id);
            break;
    }
} catch (PDOException $exception) {
    // Registra el detalle para desarrollo, pero no expone información interna al cliente.
    error_log($exception->getMessage());
}
