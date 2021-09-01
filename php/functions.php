<?php
require_once('../config/db_inc.php');
global $connection;
$connection = new DB();
// global $dbconn;
// $dbconn = $connection->config();
class functions extends DB{
   
    public function __construct(){

        parent::__construct();
    }
    // function to add task to the database

    public function add(){


         
        if(isset($_POST["submit-todo"])){
            


                            $text = $_POST["add"];
                           $dbconn = $this->conn ;
                            
                            $sql= "INSERT INTO todolist (todo_text ) VALUES(? );";
                $stmt = mysqli_stmt_init($dbconn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: main_page.php?error=stmtfailled");
                exit();

                }

                

                mysqli_stmt_bind_param($stmt, "s", $text  );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("Location: main_page.php?error=none");
                exit();
        }

    }

    // function to update the task in the database
    public function edit(){

        if(isset($_POST["edit"])){
            $dbconn = $this->conn ;
              $id = (int)$_POST["id"];
              $newtext = $_POST["new"];
              $delsql = " UPDATE todolist SET todo_text='$newtext' WHERE id = ? ;";
              $stmt = mysqli_stmt_init($dbconn);
              if(!mysqli_stmt_prepare($stmt,$delsql)){
                header("Location: main_page.php?error=stmtfailled");
                exit();
              }
              mysqli_stmt_bind_param($stmt, "i" ,$id);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_close($stmt);
              header("Location: main_page.php?error=none");
              exit();
        }
    }

    // function to delete task in the database
    public function delete(){

        if(isset($_POST["delete"])){
            $dbconn = $this->conn ;
              $id = (int)$_POST["id"];
              $delsql = " DELETE FROM todolist WhERE id = ? ;";
              $stmt = mysqli_stmt_init($dbconn);
              if(!mysqli_stmt_prepare($stmt,$delsql)){
                header("Location: main_page.php?error=stmtfailled");
                exit();
              }
              mysqli_stmt_bind_param($stmt, "i" ,$id);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_close($stmt);
              header("Location: main_page.php?error=none");
              exit();
        }
    }

    // function to read all tasks from the database
    public function fetch(){

        $dbconn = $this->conn ;
        $sql = "SELECT * FROM todolist ;";
        $result = mysqli_query($dbconn,$sql);
       return $result;
        
    }


    // function to read only the task that wants to be edited

    public function fetch_for_edit(){
        if(isset($_POST["update"])){
            
            $id =$_POST["id"];
        $dbconn = $this->conn ;
        $sql = "SELECT * FROM todolist WHERE id = '$id' ;";
        $result = mysqli_query($dbconn,$sql);
       return $result;
        }
    }
}