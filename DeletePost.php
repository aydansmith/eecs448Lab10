<?php
    
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a354s553", "eiXoh9de", "a354s553");
    
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT * FROM Posts";
    echo $temp;

    foreach($_POST as $key => $on){
        $delQuery = "DELETE FROM Posts WHERE post_id='$key'";
        if($mysqli->query($delQuery) === TRUE){
            echo "Post ".$key." has been deleted";
            echo "<br>";
        }
        else{
            echo "There is an error with the server";
            echo "<br>";
        }
    }


?>