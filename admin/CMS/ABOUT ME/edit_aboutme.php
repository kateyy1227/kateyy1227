<?php require_once "../includes/db.php"; // Adjust the path as needed


// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Now you have the $id value, and you can use it to fetch the corresponding record from the database for editing
    // Perform your database queries and editing logic here

    // ...

                // Example: Fetch record with the given ID from the 'aboutme' table using prepared statement
                $stmt = mysqli_prepare($con, "SELECT * FROM about_me_intro WHERE id= ?");
                mysqli_stmt_bind_param($stmt, "i", $id); // 'i' represents integer type
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // ...


    if ($result) {
        // Fetch the record data
        $row = mysqli_fetch_assoc($result);

        // Now you can use $row to populate your edit form
        $id = $row['id'];
        $abt_Title = $row['abt_title'];
        // Add more fields as needed

        // Display the form with the pre-filled data
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit about Me Record</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            align-items: center;
            justify-content: center;
            height: 50vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Record</h1>
    <form action="about_me_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="aboutTitle">About Title:</label>
        <input type="text" name="abt_title" value="<?php echo $about_title; ?>" required>

     <!-- Add more fields as needed -->
            <form action="about_me.php" method="post">
            <!-- Add your form fields here -->

            <input type="submit" value="Update">
            </form>

           
</body>
</html>

        <?php
    } else {
        echo "Error fetching record: " . mysqli_error($con);
    }
} else {
    echo "ID parameter is missing";
}
?>
