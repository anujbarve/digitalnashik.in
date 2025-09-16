<?php 

class Database {
    // DB PARAMS
    private $host = 'localhost';
    private $dbname = 'cms_digitalnashik';
    private $username = 'cms_digitalnashik';
    private $password = 'digitalnashik';
    
    private $conn;

    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            echo 'Connection Error : '.$th->getMessage();
        }

        return $this->conn;
    }
}

?>