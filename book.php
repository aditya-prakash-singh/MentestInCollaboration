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

// SQL query to fetch data from the counselor table
$sql = "SELECT * FROM counsellor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["email"]. " - Name: " . $row["name"]. " - Fees: " . $row["fees"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
