<?php

    // Getting database credentials
    $db_name = 'movies_api';
    $db_username = 'root';
    $db_pass = '';
    $db_server = 'localhost';

    // Connect to the database
    // $con = mysqli_connect($db_server,$db_username,$db_pass,$db_name);

  //trigger exception in a "try" block
    try {
        $con = mysqli_connect($db_server,$db_username,$db_pass,$db_name);
        if( !$con ){
            throw new Exception("Failed connection to database");
        }
        //If the exception is thrown, this text will not be shown
        // echo 'successfully connected to database';
    }

    //catch exception
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }

    // 1- Get
    // 2- Insert
    // 3- Update
    // 4- Delete

    

?>