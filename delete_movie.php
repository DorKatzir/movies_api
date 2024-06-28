<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = [];

    // provide movie id
    if ( isset($_POST['id']) ) {
        // move on and delete the movie
        $id = $_POST['id'];

        $stmt = $con->prepare("DELETE FROM movies WHERE id = ? LIMIT 1 ");
        $stmt->bind_param('i', $id);
        

    } 
    else {
        // we cannot delete the movie - we dont know wich movie to delete
    }



?>