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

// SQL query to fetch data from the counsellor table
$sql = "SELECT * FROM counsellor";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Book Appointment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    </head>
    <body style="margin: 0px; background-color: #fedbc5; color: black; transform: scale(0.9);">
        <div class="container text-center">
            <div class="row justify-content-evenly">
                <p class="h1 text-primary">Book Appointment</p>

                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card col-5 m-4">
                            <div class="card-body">
                                <h3 class="card-title text-uppercase" style="color: #de702c;"><?php echo $row['name']; ?></h3>
                                <h6 class="text-lowercase text-primary border-bottom border-danger"><?php echo $row['phone']; ?></h6>
                                <p class="card-text">
                                    One of the best counselors in <span class="text-primary"><?php echo $row['city']; ?></span>, with over
                                    <span class="text-primary"><?php echo $row['experience']; ?> years</span> of experience, holding a
                                    <span class="text-primary"><?php echo $row['qualification']; ?> in Psychology.</span>
                                </p>
                                <div class="row justify-content-evenly">
                                    <div class="col-5 p-3 bg-opacity-10 border border-info border-start rounded" style="background-color: #fedbc5;">
                                        Fees: <?php echo $row['fees']; ?> INR Per Hour
                                    </div>
                                    <div class="col-6 p-3 bg-opacity-10 border border-info border-start rounded" style="background-color: #fedbc5;">
                                        <?php echo $row['city']; ?>, <?php echo $row['state']; ?> <?php echo $row['zip']; ?>
                                    </div>
                                </div>
                                <a href="appointment.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mt-2">Book Appointment</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No counselors found.</p>";
                }
                ?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkm6s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
