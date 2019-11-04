<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$username = $_POST['username'];
if(!empty($username)){
    $mysqli = new mysqli("mysql.eecs.ku.edu", "mkapadia70", "ooH3aeK3", "mkapadia70");
    if($mysqli->connect_errno){
        echo "Connection failed: " . $mysqli->connect_error;
        exit();
    }

    $query = "INSERT INTO Users (user_id) VALUES ('" . $username . "');";
    if($result = $mysqli->query($query)){
        echo "User created successfully";
    }
    else{
        echo "That username is already taken";
    }
    $mysqli->close();
}
else{
    echo "Create error: username cannot be blank";
}
?>
