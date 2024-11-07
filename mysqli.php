<?php // mysqli.php

$link = mysqli_connect("mysql", "user", "studentpassword", "course_demo");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully using procedural style" . '<br><br>';

// Prepare a SELECT statement to fetch employee data
$query = "SELECT id, name, department_id FROM employees";

// Execute the query - will return a mysqli_result object
$result = mysqli_query($link, $query);

// Check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($link));
}

// Fetch and display each row of data
if (mysqli_num_rows($result) > 0) {
    // Iterate over the result set using `mysqli_fetch_assoc()` to retrieve each row as an associative array
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Department: " . $row['department_id'] . '<br>';
    }
} else {
    echo "No results found.";
}

// Free the memory associated with the result using
mysqli_free_result($result);

// Close the database connection to free up resources
mysqli_close($link);
