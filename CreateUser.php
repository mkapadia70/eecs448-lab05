<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$new_user_ID = $_POST['username'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "mkapadia70", "ooH3aeK3", "mkapadia70");
if($mysqli->connect_errno) {
     printf("Connection failed: %s\n" , $mysqli->connect_error);
     exit();
}
$query = "SELECT user_id FROM Users WHERE user_id='$new_user_ID'";
if($result = $mysqli->query($query)->num_rows > 0) {
     echo "{$_POST['username']} is already in use.";
} else {
     $addUser = "INSERT INTO Users (user_id) VALUES ('$new_user_ID')";
     $mysqli->query($addUser);
     echo "{$_POST['username']} is now added to the database";
}
$mysqli->close();
echo "<br><button onclick='window.history.back();'>Back</button>";
?>
