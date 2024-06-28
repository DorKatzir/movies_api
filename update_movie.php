<?php

    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = [];

    // get id
    // what can be updated? box_office, stars, storyline

    if( isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars'])&& isset($_POST['box_office']) ){
        // success

    } else {
        // fail

    }



?>