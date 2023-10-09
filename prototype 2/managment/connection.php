<?php



class DB {
    private $servername;
    private $db_name;
    private $username;
    private $password;
    public $sql;

    public function __construct($servername, $db_name,$username,$password) {
        $this->servername = $servername;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->connect = new PDO("mysql:host=".$this->servername . ";db_host=" . $this->db_name, $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected";
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        return $this->connect;   
    }

    public function send_query($sql){
        $this->sql = $sql;
        try {
            return $this->connect->query($this->sql);
        } catch (PDOException $e) {
            // Handle any exceptions that might occur during the query execution
            die("Query failed: " . $e->getMessage());
        }
    }
}










?>