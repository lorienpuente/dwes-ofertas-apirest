<?php

// Entidad compartida por el controlador y las implementaciones del DAO.
class Tarea
{
    // El id es null antes de insertar y tiene valor cuando la tarea ya está guardada.
    public ?int $id;

    // El título es obligatorio; la descripción se puede dejar vacía (null).
    public string $titulo;
    public ?string $descripcion;

    public function __construct(?int $id, string $titulo, ?string $descripcion)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
    }

    public function toArray(): array
    {
        // Define la representación JSON estable que consume la API.
        return [
            "id" => $this->id,
            "titulo" => $this->titulo,
            "descripcion" => $this->descripcion
        ];
    }
}
