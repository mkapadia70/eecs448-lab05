<?php
    echo "<h1>" . $_POST['username'] . "'s Posts</h1>";
    echo "
        <table>
        <tr>
        <th>Post ID</th>
        <th>Post</th>
        </tr>
    ";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "mkapadia70", "ooH3aeK3", "mkapadia70");
    if ($mysqli->connect_error)
    {
         printf("Connect failed: %s\n" , $mysqli->connect_error);
         exit();
    }
    $query = "SELECT * FROM Posts WHERE author_id='" . $_POST['username'] . "';";
    if ($result = $mysqli->query($query))
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row['post_id'] . "</td><td>" . $row['content'] . "</td></tr>";
        }
    }
    echo "</table>"
?>
