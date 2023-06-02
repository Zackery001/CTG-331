<?php
class Database{
    public $connection;
    public function __construct(){
        $host= "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "userdata";
        try{
            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
        }catch(PDOException $error){
            echo "Connection failed :". $error-> getMessage();
        }
    }
    public function exec($sql){
        $statement = $this->connection->prepare($sql);
        $statement->execute(); 
    }
    public function fetch($sql){
        $statement = $this->connection->prepare($sql);
        $statement->execute(); 
          
        return $statement->fetchAll();
    }
}
?>