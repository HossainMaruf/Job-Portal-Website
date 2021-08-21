


<?php

    // database file
    // Start the session
     session_start();
    //  database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "job_portal";

        //   create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //   Check connetion
        if($conn->connect_error){
            die("Connection Failed". $conn->connect_error);
        }

        // echo"Connected Successfully";
   ?>