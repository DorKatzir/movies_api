
<?php 

    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = [];

    $stmt =  $con->prepare('SELECT * FROM movies'); // mysql statemant/qurty

    if( $stmt->execute() ){
        // Array that stores all of the results
        $movies = [];

        // Get all the results from the database
        $result = $stmt->get_result(); // array with data objects [{}...]

        // Loop and get each single row 
        while( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
            // Insert each row to the array
            $movies[] = $row;
        } 

        $response['error'] = false;
        $response['movies'] = $movies;
        $response['message'] = 'Movies return successfully';
        $response['response_code'] = 200;

        $stmt->close();

    }else{
        // error
        $response['error'] = true;
        $response['message'] = 'Could not execute query';
        $response['response_code'] = 404;
    }

    // Display results
    // print_r($response);

    echo json_encode($response);

?>
