<?php
require_once('../config/db_inc.php');
$connection = new DB();
require_once('./functions.php');
$funct = new functions();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Todolist</title>
</head>
<body> 

<center> 

<div class="card" style="width:500px; border: 1px solid #ffffd1; box-shadow: 5px 10px grey; background-color:#ffebef;">
<div class="card-title " style="background-color:#ffd1dc; border:1px solid #ffffd1;"> <h1> Edit Todo List  </h1>
<form  action="main_page.php">
    <input type="submit" name="back" value="Back" style="background-color:#dcffb8;">
</form>
 </div>
<div class="card-body" style="padding-top:5px;"> 

    <div class="add">
       <?php 
    //    call out functions class functions
       $funct->edit();
       $result = $funct->fetch_for_edit();
    
    // fetch my arrray from the database
    $row = mysqli_fetch_array($result);
    
    ?>

    <!-- edit the task -->
    <form action="" method="post"> 
    <input type="text" name="new"  value="<?= $row["todo_text"] ?>">
    <input type="text" name="id" value = " <?php echo $row['id'] ?>" hidden >
    <input type="submit" name="edit" value="Update Task" style="background-color:#fff4d1;">
    
    </form>
    
    
    </div>

    <div class="list">
       
    </div>
</div>
</div>

</center>
</body>
</html>