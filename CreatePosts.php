<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$new_post = $_POST['post'];
$user = $_POST['username'];


$mysqli = new mysqli("mysql.eecs.ku.edu", "mkapadia70", "ooH3aeK3", "mkapadia70");
if ($mysqli->connect_errno)
{
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
}

$query = "SELECT user_id FROM Users WHERE user_id='". $user . "';";
if(mysqli_num_rows($mysqli->query($query)) != 0)
{
     $mysqli->query("INSERT INTO Posts (content, author_id) VALUES ('$new_post', '$user')");
     echo 'The post was saved to the database';
}

else
{
     echo "{$_POST['username']} was not found in the database";
}
$mysqli->close();

?>
