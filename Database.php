<?php
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

class Database {
    private $conn;

    /**
     * connect the database
     *
     * @return void
     */
    public function __construct() {
        $this->conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * disconnect the database
     *
     * @return void
     */
    public function __destruct() {
        $this->conn->close();
    }
}
