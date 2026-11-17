<?php

require_once __DIR__ . "/DAOTareas.php";
require_once __DIR__ . "/../entities/Tarea.php";

// Implementa el contrato del DAO usando PDO y la tabla MySQL "tareas".
class DAOTareasMySQL implements DAOTareas
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function obtenerTodas(): array
    {
        // Los marcadores de posición no son necesarios para una consulta sin datos de entrada.
        $statement = $this->db->query("SELECT id, titulo, descripcion FROM tareas ORDER BY id ASC");
        return array_map([$this, "crearTareaDesdeFila"], $statement->fetchAll());
    }

    public function obtenerPorId(int $id): ?Tarea
    {
        // Las consultas preparadas separan los datos del SQL y evitan concatenar la entrada.
        $statement = $this->db->prepare("SELECT id, titulo, descripcion FROM tareas WHERE id = :id");
        $statement->execute(["id" => $id]);
        $row = $statement->fetch();

        return $row === false ? null : $this->crearTareaDesdeFila($row);
    }

    public function crear(Tarea $tarea): Tarea
    {
        // Inserta únicamente los campos editables; MySQL asigna el identificador.
        $statement = $this->db->prepare(
            "INSERT INTO tareas (titulo, descripcion) VALUES (:titulo, :descripcion)"
        );
        $statement->execute([
            "titulo" => $tarea->titulo,
            "descripcion" => $tarea->descripcion
        ]);

        // Lee la fila insertada para devolver también el id generado por MySQL.
        return $this->obtenerPorId((int) $this->db->lastInsertId());
    }

    public function actualizar(int $id, Tarea $tarea): ?Tarea
    {
        // Ejecuta el reemplazo y vuelve a leer la fila para devolver el estado persistido.
        $statement = $this->db->prepare(
            "UPDATE tareas SET titulo = :titulo, descripcion = :descripcion WHERE id = :id"
        );
        $statement->execute([
            "titulo" => $tarea->titulo,
            "descripcion" => $tarea->descripcion,
            "id" => $id
        ]);

        return $this->obtenerPorId($id);
    }

    public function eliminar(int $id): bool
    {
        // rowCount distingue entre un registro eliminado y un id que no existía.
        $statement = $this->db->prepare("DELETE FROM tareas WHERE id = :id");
        $statement->execute(["id" => $id]);

        return $statement->rowCount() > 0;
    }

    private function crearTareaDesdeFila(array $row): Tarea
    {
        // PDO devuelve el id como texto; la entidad lo representa como entero.
        return new Tarea((int) $row["id"], $row["titulo"], $row["descripcion"]);
    }
}
