<?php
session_start(); // Start a session to manage user login state

// Database connection configuration
$servername = "localhost";
$username = "urstapoj_ankush";
$password = "Ankush@123#";
$database = "urstapoj_mentest";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // Prepare a statement to check if username and password match
    $stmt = $conn->prepare("SELECT * FROM adminlogin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass); // Bind username and password parameters

    // Execute the statement and get the result
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If a record is found, login is successful
        $_SESSION["admin_logged_in"] = true; // Set a session variable to indicate the admin is logged in
        header("Location: data.php"); // Redirect to data.php
        exit();
    } else {
        echo "Invalid username or password."; // Incorrect username or password
    }

    $stmt->close(); // Close the statement
}

$conn->close(); // Close the database connection
?>



 
