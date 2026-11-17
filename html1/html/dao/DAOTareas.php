<?php

require_once __DIR__ . "/../entities/Tarea.php";

// Contrato de operaciones de tareas, independiente del motor de persistencia.
interface DAOTareas
{
    // Devuelve todas las tareas ordenadas por la implementación.
    public function obtenerTodas(): array;

    // Devuelve null cuando no existe una tarea con ese identificador.
    public function obtenerPorId(int $id): ?Tarea;

    // Persiste la tarea y devuelve la instancia con su identificador asignado.
    public function crear(Tarea $tarea): Tarea;

    // Devuelve null si el identificador que se intenta actualizar no existe.
    public function actualizar(int $id, Tarea $tarea): ?Tarea;

    // Indica si se eliminó una tarea.
    public function eliminar(int $id): bool;
}
