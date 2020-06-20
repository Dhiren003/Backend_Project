<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "social";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection() {
        if($this->conn == null) {
            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
        return $this->conn;
    }
}
?>