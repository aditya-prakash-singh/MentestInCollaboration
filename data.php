<?php
// Start a session and check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // If session is not active, redirect to the login page
    header("Location: adminlog.html");
    exit(); // Ensure no further code is executed
}

?>

<?php
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection configuration
$servername = "localhost";
$username = "urstapoj_ankush"; // Your database username
$password = "Ankush@123#"; // Your database password
$dbname = "urstapoj_mentest"; // Your database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="m-5">
    <center><h3 class="text-primary">Counsellors List</h3></center>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody><!--Ye Heading hai isko rahne dena-->
                        <tr class="text-uppercase" >
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">ID</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Name</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Email</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Phone</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Gender</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Qualification</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Experience</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Fees</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Address</td>
                        </tr>



                        <!--Counsellor Data Isme aayega-->
                       <!-- Fetch and display Counsellors data -->
                        <?php
                        $counsellorsQuery = "SELECT * FROM counsellor"; // Table name for counsellors
                        $counsellorsResult = $conn->query($counsellorsQuery);

                        if ($counsellorsResult === false) {
                            die("Query error: " . $conn->error);
                        }

                        if ($counsellorsResult->num_rows > 0) {
                            while ($row = $counsellorsResult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["id"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["name"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["email"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["phone"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["gender"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["qualification"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["experience"] . " " . "Years </td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>₹ " . $row["fees"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["city"] . ", " . $row["state"] . ", " . $row["zip"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>No Counsellors Found</td></tr>";
                        }
                        ?>
                        <!--comment ke beech wala itna part php me ranhega-->




                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <center><h3 class="text-primary">Booking List</h3></center>
    <div class="container">
        <div class="row">
            <div class="col">
                
                <table class="table">
                    <tbody><!--Ye Heading hai isko rahne dena-->
                        <tr class="text-uppercase" >
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Name</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Email</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Phone</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Gender</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Score</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Address</td>
                            <td style='background-color:#fedbc5' class="text-dark border border-dark p-2">Booked Counsellor ID</td>
                        </tr>




                        <!--Booking Data Isme aayega-->
                        <!-- Fetch and display Booking data -->
                        <?php
                        $bookingQuery = "SELECT * FROM user"; // Table name for bookings or users
                        $bookingResult = $conn->query($bookingQuery);

                        if ($bookingResult === false) {
                            die("Query error: " . $conn->error);
                        }

                        if ($bookingResult->num_rows > 0) {
                            while ($row = $bookingResult->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["name"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["email"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["phone"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["gender"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["score"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["city"] . ", " . $row["state"] . ", " . $row["zip"] . "</td>";
                                echo "<td class='text-primary border border-danger rounded-end p-2'>" . $row["counsellorid"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No Bookings Found</td></tr>";
                        }
                        ?>
                        <!--comment ke beech wala itna part php me ranhega-->




                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>