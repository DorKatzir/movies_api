<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = [];

    // get id
    // what can be updated? box_office, stars, storyline

    if( isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars'])&& isset($_POST['box_office']) ){
        // move on and update movie
        $id = $_POST['id'];
        $storyline = $_POST['storyline'];
        $stars = $_POST['stars'];
        $box_office = $_POST['box_office'];

        $stmt = $con->prepare("UPDATE movies SET storyline='$storyline', stars='$stars', box_office='$box_office' WHERE id='$id'");

                if( $stmt->execute() ){
                    // success
                    $response['error'] = false;
                    $response['message'] = 'Movie Updated Successfully';

                } else {
                    // fail
                    $response['error'] = true;
                    $response['message'] = 'Movie Failed to Update';
                }
                
    } else {
        // we dont have info to update the movie
        $response['error'] = true;
        $response['message'] = 'Please provide: id, storyline, stars and box_office';
    }

    echo json_encode($response);

?>