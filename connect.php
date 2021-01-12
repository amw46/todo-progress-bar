<?php
        $servername = "localhost";
        $username = "root";
        $password = "groot";
        $dbName = "todos";
        
        print '<h1>PHP is here!</h1>';
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbName);
        
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error().'<br>');
        }
        else {
          print ("<p>Connected successfully to db " . $dbName ."</p>");  
        }

?>