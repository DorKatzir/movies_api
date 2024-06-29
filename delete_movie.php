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

            if ($stmt->execute()) {
                // success
                $response['error'] = false;
                $response['message'] = 'Successfully Deleted movie';
                $response['response_code'] = 204; // succsses with no content returned
                
            } else {
                // fail
                $response['error'] = true;
                $response['message'] = 'Failed to delete movie';
                $response['response_code'] = 400;
            }
            
        } 
        else {
            // we cannot delete the movie - we dont know wich movie to delete
            $response['error'] = true;
            $response['message'] = 'Please provide movie id to delete';
            $response['response_code'] = 404;
        }

    echo json_encode($response);

?>