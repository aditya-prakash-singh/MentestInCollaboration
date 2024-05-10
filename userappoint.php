<?php
// Database credentials
$servername = "localhost";
$username = "urstapoj_ankush";
$password = "Ankush@123#";
$database = "urstapoj_mentest";

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
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $score = $_POST['score'];
    $counsellorid = $_POST['counsellorid']; // Use the value passed from the form
// $counsellorid = 1;
 

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO user (name, email, gender, city, state, zip, phone, score, counsellorid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $gender, $city, $state, $zip, $phone, $score, $counsellorid);

    // Execute SQL statement
    if ($stmt->execute()) {
       // echo "Form data saved successfully.";
         header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

?>
