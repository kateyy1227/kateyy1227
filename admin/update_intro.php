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
        $user_intro = mysqli_real_escape_string($con, $_POST["user_intro"]);
        $user_name = mysqli_real_escape_string($con, $_POST["user_name"]);

        // Update the record in the 'intro' table using prepared statement
        $stmt = mysqli_prepare($con, "UPDATE intro SET user_name = ?, user_intro = ? WHERE intro_id = ?");
        mysqli_stmt_bind_param($stmt, "ssi", $user_name, $user_intro, $id);

        // Check if the statement executed successfully
        if (mysqli_stmt_execute($stmt)) {
            // Display a success message using JavaScript alert
            echo "<script>alert('Record updated successfully'); window.location.href = 'system_socialmedia.php';</script>";
        } else {
            // Log detailed error for debugging and provide a user-friendly message
            error_log("Error updating record: " . mysqli_error($con));
            echo "Error updating record. Please try again later.";
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
