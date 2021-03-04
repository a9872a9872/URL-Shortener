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

    public function store($long_url) {
        $long_url = addslashes($long_url);
        $length = 10;
        $url = new Url();
        $shortUrl = $url->getShortUrl($length);

        $sql = "INSERT INTO url(url, code) VALUES ('$long_url', '$shortUrl')";
        $this->conn->query($sql);

        if ($this->conn->affected_rows > 0) {
            return $shortUrl;
        } else {
            return false;
        }
    }

    public function getUrl($code) {
        $code = addslashes($code);
        $sql = "SELECT url FROM url WHERE code = '$code'";

        return $this->conn->query($sql);
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
