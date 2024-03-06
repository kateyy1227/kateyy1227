<?php
require_once "../includes/db.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the 'id' parameter is present in the form
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Sanitize and validate other form inputs as needed
        $aboutTitle = mysqli_real_escape_string($con, $_POST["aboutTitle"]);

        // Update the record in the 'aboutme' table using prepared statement
        $stmt = mysqli_prepare($con, "UPDATE aboutme SET about_title = ? WHERE about_id = ?");
        mysqli_stmt_bind_param($stmt, "si", $aboutTitle, $id);

        // Check if the statement executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Display a success message using JavaScript alert
            echo "<script>alert('Record updated successfully'); window.location.href = 'system_info.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ID parameter is missing";
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($con);
?>

<style>
    .back-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<body>
    <!-- Style the link as a button -->
    <a class="back-button" href="system_info.php">Back</a>
</body>
</html>
