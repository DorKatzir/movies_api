
<?php

    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = [];
    

    if( isset($_GET['title']) ) {
        // get the movie
        $title = $_GET['title']; // request parameter

        $stmt = $con->prepare("SELECT id, title, lang, genre, release_date, box_office, run_time, stars 
                        FROM movies WHERE title = ? ");
        $stmt->bind_param("s", $title);
        if( $stmt->execute()) {
            // success
            $stmt->bind_result($id, $title, $lang, $genre, $release_date, $box_office, $run_time, $stars);
            $stmt->fetch();

        if ($id === null) {
            $response['error'] = true;
            $response['message'] = 'no data';
            $response['response_code'] = 404;
            echo json_encode($response);
            return;
        }

            $movie = [
                'id' => $id, 
                'title' => $title, 
                'lang' => $lang, 
                'genre' => $genre, 
                'release_date' => $release_date,
                'box_office' => $box_office,
                'run_time' => $run_time,
                'stars' => $stars
            ];

            $response['error'] = false;
            $response['movie'] = $movie;
            $response['message'] = 'movie return successfully';
            $response['response_code'] = 200;

        } else {
            // fail
            $response['error'] = true;
            $response['message'] = 'we could not get the movie';
            $response['response_code'] = 404;
        }

    } else {

        // no movie was provided, we cannot get the movie.
        $response['error'] = true;
        $response['message'] = 'Please provide a movie title';
        $response['response_code'] = 404;
    }

    echo json_encode($response);

?>
