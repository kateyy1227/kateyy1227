<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Page</title>
    
    <!-- Include Font Awesome CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    
    <!-- Your other head elements go here -->
</head>
<body>

<?php require_once "includes/db.php"; ?>

<section class="hero">
    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "mapasi");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to fetch data from 'intro' table
    $sql = "SELECT * FROM about_me_intro";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Loop through the results and display them
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h1>{$row['abt_title']}</h1>"; // Replace 'user_name' with the actual column name from your 'intro' table
            echo "<p>{$row['abt_description']}</p>"; // Replace 'user_intro' with the actual column name from your 'intro' table
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
    ?>


</body>
</html>
