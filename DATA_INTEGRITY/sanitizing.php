<?php // DATA_INTEGRITY/sanitizing.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use filter_input to get and sanitize the comment input
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    // Check if the comment is not empty
    if (!empty($comment)) {
        echo "<p>Comment received: " . $comment . "</p>";
    } else {
        echo "<p>No comment provided or comment is invalid.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Comment</title>
</head>
<body>
<h2>Submit a Comment</h2>
<!-- Simple HTML form for submitting a comment -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="comment">Comment:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>
    <button type="submit">Submit Comment</button>
</form>
</body>
</html>
