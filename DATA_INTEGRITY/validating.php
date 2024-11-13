<?php // DATA_INTEGRITY/validating.php

// Validating an integer
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (false === $id) {
    echo "Invalid ID provided.";
} else {
    echo "Validated ID: $id";
}
