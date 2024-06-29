<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = [];

    $title = $_POST['title'];
    $storyline = $_POST['storyline'];
    $lang = $_POST['lang'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $box_office = $_POST['box_office'];
    $run_time = $_POST['run_time'];
    $stars = $_POST['stars'];

    // the id will be created by the database

    if ( isset($title) && isset($storyline) && isset($lang) && isset($genre) && isset($release_date) && isset($box_office) && isset($run_time) && isset($stars) ) {
        // we have all parameters
        $stmt = $con->prepare("INSERT INTO movies (title, storyline, lang, genre, release_date, box_office, run_time, stars) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssdsd',$title, $storyline, $lang, $genre, $release_date, $box_office, $run_time, $stars );

            if( $stmt->execute() ){
                //success
                $response['error'] = false;
                $response['message'] = 'Movie Inserted';
                $response['response_code'] = 201; // the resource created successfully
                
            } else {
                //fail
                $response['error'] = true;
                $response['message'] = 'Failed to create movie';
                $response['response_code'] = 404;
            }
            
        }
        else {
            // no data to insert, provide movie data
            $response['error'] = true;
            $response['message'] = 'Please provide All Movie parameters';
            $response['response_code'] = 404;
    }

    echo json_encode($response);

?>