<?php
    $user_id = $_POST["UserID"];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a354s553", "eiXoh9de", "a354s553");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $query = "SELECT user_id FROM Users";
    $inTable = false;
    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            if($row['user_id'] == $user_id){
                $inTable = true;
            }
        }
    }
    if($user_id == ""){
        echo "The user could not be stored, the user id form was left blank\n";
    }
    else if($inTable){
        echo "The user could not be stored, the user id already exists\n";
    }
    else{
        $addition = "INSERT INTO Users (user_id) VALUE ('".$user_id."')";
        if($mysqli->query($addition) === TRUE){
            echo "User has been added";
        }
        else{
            echo "There is an error with the server";
        }
    }
?>