<?php

require_once __DIR__ . "/../db/Database.php";
require_once __DIR__ . "/DAOTareasMySQL.php";

// Centraliza la creación del DAO para desacoplar la API de la base de datos concreta.
class DAOFactory
{
    // Ofrece un único punto para cambiar la implementación del DAO en el futuro.
    public static function getDAOTareas(): DAOTareas
    {
        // La conexión se comparte con la implementación que atiende la petición.
        return new DAOTareasMySQL((new Database())->getConnection());
    }
}
