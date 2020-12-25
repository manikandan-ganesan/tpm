<?php

$conn = mysqli_connect('localhost', 'root', '', 'pm-projects');

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>