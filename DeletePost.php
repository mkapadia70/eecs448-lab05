<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "mkapadia70", "ooH3aeK3", "mkapadia70");
    if ($mysqli->connect_errno)
    {
         printf("Connect failed: %s\n" , $mysqli->connect_error);
         exit();
    }
    foreach($_POST['delete'] as $postID)
    {
        $query = "DELETE FROM Posts WHERE post_id='" . $postID. "';";
        if ($result = $mysqli->query($query))
        {
            echo "Post " . $postID . " has been deleted!";
        }
        else
        {
            echo "Error!" . $postID;
        }
    }
    $query = "DELETE FROM Posts WHERE post_id='" . $_POST['post_id'] . "';";
    if ($result = $mysqli->query($query))
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row['post_id'] . "</td><td>" . $row['content'] . "</td></tr>";
        }
    }
    echo "</table>"
?>
