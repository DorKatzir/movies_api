<?php
error_reporting(0);

    //Getting database credentials
    $db_name = 'movies_api';
    $mysql_username = 'root';
    $mysql_pass = '';
    $server_name = '127.0.0.1';

    $con = mysqli_connect($server_name,$mysql_username,$mysql_pass,$db_name);

    !$con ? print_r('no such thing') : print_r('success');


?>