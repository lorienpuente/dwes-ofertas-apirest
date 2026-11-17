<?php

// Crea una conexión PDO reutilizable con los parámetros del entorno.
class Database
{
    private string $host;
    private string $port;
    private string $db_name;
    private string $username;
    private string $password;
    private ?PDO $conn = null;

    public function __construct()
    {
        // Los valores predeterminados permiten ejecutar el proyecto sin un archivo .env.
        $this->host = getenv("DB_HOST") ?: "bbddexamen.cnbi2iiygqkq.us-east-1.rds.amazonaws.com";
        $this->port = getenv("DB_PORT") ?: "3306";
        $this->db_name = getenv("DB_NAME") ?: "tareas";
        $this->username = getenv("DB_USERNAME") ?: "admin";
        $this->password = getenv("DB_PASSWORD") ?: "bbddexamen";
    }

    public function getConnection(): PDO
    {
        if ($this->conn === null) {
            // Las excepciones y el modo asociativo simplifican el manejo uniforme de resultados.
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }

        // Reutiliza la conexión si el objeto necesita acceder a ella más de una vez.
        return $this->conn;
    }
}
