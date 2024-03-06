<?php require_once "includes/header.php"?>
<?php require_once "includes/nav.php"?>
<?php require_once "index.php"?>
<?php require_once "../includes/db.php"?> // Adjust the path as needed
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</nav>
</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-5 text-center">Social Media Menu</h1>
            
            <div class="row">
                <?php
                if (!$con) {
                    echo "Failed to connect to the database";
                } else {
                    // Fetch data from the database
                    $result = mysqli_query($con, "SELECT * FROM system_socialmeda"); // Replace 'aboutme' with the actual table name

                    if ($result) {
                ?>
                <div class="col-lg-5 mx-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Platform</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['platform']}</td>";
                                echo "<td>{$row['link']}</td>";
                                echo "<td><a href='edit_socialmedia.php?id={$row['id']}' class='btn btn-primary'>Edit</a></td>"; // Added the edit button
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    } else {
                        echo "Error fetching data: " . mysqli_error($con);
                    }
                }
                ?>
                <div>
               

                <div class="col-lg-5 mx-auto">
                <h1 class="mt-5 text-center">Welcome Message</h1>
                    <!-- Second table, adjust the column names as needed -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name introduction</th>
                                <th>Short description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                             $result = mysqli_query($con, "SELECT * FROM intro");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['user_name']}</td>";
                                  echo "<td>{$row['user_intro']}</td>";
                               
                                 echo "<td><a href='edit_intro.php?id={$row['intro_id']}' class='btn btn-primary'>Edit</a></td>";
                                 echo "</tr>";
                             }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
