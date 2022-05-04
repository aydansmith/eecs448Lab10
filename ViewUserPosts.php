<?php
    $user_id = $_POST["userChoice"];
    
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a354s553", "eiXoh9de", "a354s553");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $query = "SELECT content FROM Posts WHERE author_id='$user_id'";
    //echo $query;
    echo "<table id='table1'>";
        echo("<tr>");
        echo("<th>Posts for ".$user_id."</th>");
        echo("</tr>");

        if($result = $mysqli->query($query)){
            while($row = $result->fetch_assoc()){
                echo("<tr>");
                    echo("<td>".$row['content']."</td>");
                echo("</tr>"); 
            }
        }

    echo("</table>");


    echo("<style>");
        echo("table, td, tr, th{border: 1px solid black}");
    echo("</style>");

?>