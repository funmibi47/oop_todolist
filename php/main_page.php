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
<div class="card-title " style="background-color:#ffd1dc; border:1px solid #ffffd1;"> <h1>Todo List </h1> </div>
<div class="card-body" style="padding-top:5px;"> 

    <div class="add">
        <!-- call out functions class functions -->
       <?php $funct->add(); 
       $funct->delete();
      $result =  $funct->fetch();
    
    ?>

    <!-- form with need inputs, once the submit button is clicked it sends it to the database -->
    <form action="" method="post"> 
    <input type="text" name="add" >
    <input type="submit" name="submit-todo" value="Create Task" style="background-color:#fff4d1;">
    </form>
    </div>

    <!-- list of all the created tasks -->

    <div class="list">
        <table>

           <thead>
           <tr>
                <th>Task</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
           </thead>

           <tbody>
               <?php while( $row = mysqli_fetch_array($result)): ?>
               <tr style="padding-top:5px; padding-bottom:2px;">
                   <td><?php echo $row['todo_text']; ?></td>

                   <td>
                       <form action="edit.php" method="post"> 
                       <input type="text" name="id" value = "<?php echo $row['id'] ?> "hidden >
                       <input type="submit" name="update" style="background-color:#dcffd1;" value="Edit Task">
                       </form>
                    </td>

                   <td>
                       <form action="" method="post"> 
                       <input type="text" name="id" value = " <?php echo $row['id'] ?>" hidden >
                       <input type="submit" name="delete"  style="background-color:#d1dcff;" value="Delete Task">
                       </form>
                    </td>
               </tr>
               <?php endwhile;?>
           </tbody>
        </table>
    </div>
</div>
</div>

</center>
</body>
</html>