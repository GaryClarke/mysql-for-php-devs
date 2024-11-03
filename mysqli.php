<?php // mysqli.php

// Connect to MySQL using mysqli (procedural)
$link = mysqli_connect("mysql", "user", "studentpassword", "course_demo");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully using procedural style";


// Connect to MySQL using mysqli (OOP)
$mysqli = new mysqli("mysql", "user", "studentpassword", "course_demo");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully using OOP style";



