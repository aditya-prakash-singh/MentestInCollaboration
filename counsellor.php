<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "mentest";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $fees = $_POST['fees'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO counsellor (name, email, gender, qualification, experience, phone, city, state, zip, fees) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $email, $gender, $qualification, $experience, $phone, $city, $state, $zip, $fees);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Form data saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
