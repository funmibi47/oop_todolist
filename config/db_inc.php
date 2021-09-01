<?php
// database connection
// i used phpmyadmin to execute my queries
class DB{
    public $conn;
    public function __construct(){
        $this->config();
    }

    public function config(){
        $serverName = "localhost";
        $DBUserename = "root";
        $DBName = "todo";
        $DBPassword = "";
        
        $this->conn =  mysqli_connect($serverName, $DBUserename, $DBPassword, $DBName );
        
        
        if(!$this->conn){
            die("connection failled:".mysqli_connect_error());
            
        }
        return $this->conn;
    }
}