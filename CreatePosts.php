<?php
    $user_id = $_POST["UserID"];
    $content = $_POST["postContent"];
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
        echo "The post could not be stored, the user id form was left blank\n";
    }
    else if(!$inTable){
        echo "The post could not be stored, the user id does not exist\n";
    }
    else if($content == ""){
        echo "The post could not be stored, the content form was left blank\n";
    }
    else{
        
        $addition = "INSERT INTO Posts (content, author_id) VALUES ('".$content."', '".$user_id."')";
        echo($addtion);
        if($mysqli->query($addition) === TRUE){
            echo "Content has been added";
        }
        else{
            echo "That user already exists";
        }
        
    }
?>