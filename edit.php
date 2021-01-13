<?php
    include 'connect.php';
    session_start();

    function update_data($taskNm, $taskDesc, $perComp, $tid) {
        global $conn;
        $sql = 'update todos set taskName=?, taskDescription=?, percentCompleted=? where (id=?);';
        $stmt = mysqli_prepare($conn, $sql) or die("<br>Error with query: ". mysqli_error($conn));
        mysqli_stmt_bind_param($stmt, "ssii", $taskNm, $taskDesc, $perComp, $tid);
        if(mysqli_stmt_execute($stmt)) { //if successful
            return true;
        } else {
            die("<br>Error with query: ". mysqli_error($conn));
            return false;
        }
           //Closing the statement
        mysqli_stmt_close($stmt);
        
    }


    //set the session before field value is grabbed.
    $_SESSION['todoId'] = null;
    if(isset($_GET['todoId'])) { //check if there is a value
        $select = $_GET['todoId'];
        $_SESSION['todoId'] = $select;
        //query for person and set the name session var
        $person_sql = "select * from todos where id=". $select;
        $result2 = mysqli_query($conn, $person_sql) or die("<br>Error with query: ". mysqli_error($conn));
        $rows2 = mysqli_fetch_assoc($result2);
        
        
        
    } else { //if not set, redirect
        header('./todos.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a To-Do</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Andika+New+Basic&family=PT+Sans&family=Josefin+Sans">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<body>

    <?php if(isset($_POST['taskName']) && isset($_POST['taskDescription']) && isset($_POST['percentCompleted'])) {?>
    <?Php 
        if(update_data($_POST['taskName'], $_POST['taskDescription'],$_POST['percentCompleted'], $_POST['todoId'])) { //success
            header('Location: todos.php');
            exit();
        }
        else { //fail
            echo 'Something went wrong. ';
            echo '<br><br><a href="todos.php">Return to Todos page</a>';
        }
       
    } ?>
    <form action="edit.php" method="post">
        <label for="taskName"  class='todo-form' >Task Name: </label><input type="text" name="taskName" id="taskName"  class='todo-form' value='<?php echo $rows2['taskName'];?>'>
        <label for="taskDescription"  class='todo-form' >Task Description: </label><input type="text" name="taskDescription" id="taskDescription"  class='todo-form' value='<?php echo $rows2['taskDescription'];?>'>
        <input type="hidden" name="todoId" id="todoId" value='<?php echo $_SESSION['todoId'];?>'>
        <label for="percentCompleted"  class='todo-form'>Percent Completed: </label><input type="number" name="percentCompleted" id="percentCompleted"  class='todo-form' value='<?php echo $rows2['percentCompleted'];?>'>
        <input type="submit" value="Enter"  class='todo-form'>
    </form>
</body>
</html>
