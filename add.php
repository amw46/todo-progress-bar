<?php
    include 'connect.php';
    session_start();

    function insert_data($taskNm, $taskDesc, $pId, $perComp) {
        $sql = 'insert into todos (taskName, taskDescription, personId, percentCompleted) values (?, ?, ?, ?);';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssii", $taskNm, $taskDesc, $pId, $perComp);
        if(mysqli_stmt_execute($stmt)) { //if successful
            return true;
        } else {
            return false;
        }
           //Closing the statement
        mysqli_stmt_close($stmt);
        
    }


    //set the session before field value is grabbed.
    $_SESSION['personId'] = null;
    $_SESSION['name'] = null;
    if(isset($_GET['personId'])) { //check if there is a value
        $select = $_GET['personId'];
        $_SESSION['personId'] = $select;
        //query for person and set the name session var
        $person_sql = "select * from people where personId=". $select;
        $result2 = mysqli_query($conn, $person_sql) or die("<br>Error with query: ". mysqli_error($conn));
        $rows2 = mysqli_fetch_assoc($result2);
        $_SESSION['name'] = $rows2['firstName']." ". $rows2['lastName'];

        echo 'You are now adding a to-do item for: <strong>' . $_SESSION['name'] . '</strong>';
        
    } else { //if not set, redirect
        header('Location: todos.php');
        exit();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a To-Do</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Andika+New+Basic&family=PT+Sans&family=Josefin+Sans">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<body>

    <?php if(isset($_POST['taskName']) && isset($_POST['taskDescription']) && isset($_POST['percentCompleted'])) {?>
    <p><?php echo $_POST['taskName'];
        echo $_POST['taskDescription'];
        echo $_POST['percentCompleted'];
        
    }?></p>
    <form action="add.php" method="post">
        <label for="taskName"  class='todo-form'>Task Name: </label><input type="text" name="taskName" id="taskName"  class='todo-form'>
        <label for="taskDescription"  class='todo-form' >Task Description: </label><input type="text" name="taskDescription" id="taskDescription"  class='todo-form'>
        <input type="hidden" name="personId" id="personId" value='<?php echo $_SESSION['personId'];?>'>
        <label for="percentCompleted"  class='todo-form'>Percent Completed: </label><input type="number" name="percentCompleted" id="percentCompleted"  class='todo-form'>
        <input type="submit" value="Enter"  class='todo-form'>
    </form>
    
</body>
</html>
