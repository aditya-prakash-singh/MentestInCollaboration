<?php
// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the value of 'id'
    $id = $_GET['id'];

    // Now you can use $id in your PHP code
    echo "The ID from the URL is: " . htmlspecialchars($id);
} else {
    echo "No ID parameter found in the URL.";
}
?>
