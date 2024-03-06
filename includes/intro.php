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
    $sql = "SELECT * FROM intro";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Loop through the results and display them
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h1>{$row['user_name']}</h1>"; // Replace 'user_name' with the actual column name from your 'intro' table
            echo "<p>{$row['user_intro']}</p>"; // Replace 'user_intro' with the actual column name from your 'intro' table
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</section>

<section class="database-section">
    <?php
    // Database connection (use a different variable name to avoid conflicts)
    $con = mysqli_connect("localhost", "root", "", "mapasi");

    // Check the connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to fetch social links from 'system_socialmedia' table (corrected table name)
    $sql = "SELECT * FROM system_socialmeda";
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        echo '<div class="social-menu"><ul>';
        
        // Fetch data and generate social links
        while ($row = mysqli_fetch_assoc($result)) {
            // Assuming 'icon' column contains class names for Font Awesome icons
            echo "<li><a href='{$row['link']}' target='_blank'><i class='fab {$row['icon']}'></i></a></li>";
        }

        echo '</ul></div>';

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
    ?>
</section>

</body>
</html>
