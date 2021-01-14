<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos Application</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animation_example.css">
    <link rel="stylesheet" href="progress_bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Andika+New+Basic&family=PT+Sans&family=Josefin+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body onload='prog_bar();'>

    <nav class="hw-nav">
        <i class="fa fa-hand-peace-o fa-2x"></i>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="./todos.php" class='active'>Todos</a>
        <a href="./contact.html">Contact Us</a>

    </nav>

  
    <?php
        session_start();
        include 'connect.php';

        function delete_data($id) {
            //delete the todo by id
        }
    ?>

    <!-- <p id="person"></p> -->
    <br>
 
    <?php
  
        if(isset($_POST['action'])) { //if the action var is set
            if($_POST['action'] == 'delete' && isset($_POST['todoId'])) {//if the action is delete
                delete_data($_POST['todoId']);
            } 

        } 
        
        //get all people from the people table
        $sql = 'select * from people';
        $result = mysqli_query($conn, $sql) or die("<br>Error with query: ". mysqli_error($conn));
        echo '<form action="todos.php" method="post">'; //setup form
        echo '<select id="person" name="person">'; //select input
        echo '<option value="0">--Select Person--</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=\''. $row['personId'] . '\'>'.$row['firstName'].' '.$row['lastName'].'</option>';
        }
        echo '</select>';
        echo '<input type="submit" name="submit" value="Choose option">';
        echo '</form>';

        //set the session before field value is grabbed.
        $_SESSION['personId'] = null;
        $_SESSION['name'] = null;
        if(isset($_POST['submit'])){
            if(!empty($_POST['person'])){ //if the select is not empty

                $select = $_POST['person'];
                $_SESSION['personId'] = $select; //set the session var

                //query for person and set the name session var
                $person_sql = "select * from people where personId=". $select;
                $result2 = mysqli_query($conn, $person_sql) or die("<br>Error with query: ". mysqli_error($conn));
                $rows2 = mysqli_fetch_assoc($result2);
                $_SESSION['name'] = $rows2['firstName']." ". $rows2['lastName'];

               
                //echo "You have selected " . $select;
                echo "You are now viewing " . $_SESSION['name'] . "'s To-Do List.";

                echo '<br><br><a href="add.php?personId='. $select .'">Add A New To-Do Item</a>';
            } else {
                print '<strong>Please select a value.</strong>';
            }
            
        }

    ?>

    <br>
    <?php 
    //display todo div if session is set / not 0 (non-select)
        if(!empty($_SESSION['personId'])) {
        // if(!empty($_SESSION['personId'])) {

          
        $sql = 'select * from todos where personId = ' . $_SESSION['personId'];
        $result = mysqli_query($conn, $sql) or die("<br>Error with query: ". mysqli_error($conn));
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
  
    ?>
    <div class="hw-card">
        

        <?php

        // print_r($rows);
        //echo mysqli_fetch_assoc();
        
        echo '<a href="edit.php?todoId='. $row['id'] .'" class="edit"><i class="fa fa-pencil fa-lg"></i></a>';

        echo '<form action="todos.php" method="post">';
        echo '<input type="hidden" name="todoId" value="'. $row['id'] . '">';
        echo '<input type="hidden" name="action" value="delete">';
        echo '<button type="submit" class="exit"><i class="fa fa-trash fa-2x"></i></button>';
        echo '</form>';

        // print '<a href="" class="exit"><i class="fa fa-trash fa-2x"></i></a>';
        print("<strong>Task Name</strong>: " . $row['taskName'].'<br>');
        print("<strong>Task Description</strong>: " . $row['taskDescription'].'<br>');
        print("<input type='hidden' class='percent' id='percent' value=\"".$row["percentCompleted"]."\">");


        ?> 

        <p class='val' id="val"></p>
        <!-- progress bar container -->
        <div class="progress-bar-outline">
            <div id='progress-bar<?php echo $count;?>'></div>
        </div>

    </div> 
    <?php $count++; } //end while ?>
    <br><br>
    <?php }  else { 

        session_unset(); ?>

        <br>
        <p>No to-do list items are available!</p>

        <?php } ?>
    
    

    <script src="scripts copy.js" type="text/javascript"></script>
    <!-- <script src="./confetti/confetti.js"></script>
    <script>confetti.start();</script> -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.2/dist/confetti.browser.min.js"></script>

    <!-- after dome elements have loaded, load in this script -->
    <script type="text/javascript">
    //listen for a change in the textbox value
        window.addEventListener('load', doThing);  
        function doThing() {
            var percent = document.getElementById('percent').value; //get the percent value from text

            var percentVals = document.querySelectorAll('.percent'); //find all hidden inputs with percent class

            for (i=0; i<percentVals.length; i++) {
                var percent= percentVals[i].value;

                if (percent == 100) {
                    setTimeout(() => confetti({
                            particleCount: 300,
                            spread: 1000,
                            origin: { y: -0.4}
                    }), 2450);   
                } //end if
            } //end for
        } //end func
        
        
        </script>

</body>
</html>