// /config/database.php
<?php
class Database {
    private $host = "reddy.beget.tech";
    private $db_name = "reddy_t2p";
    private $username = "reddy_t2p";
    private $password = "Mysql95";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
