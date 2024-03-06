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
            <h1 class="mt-5 text-center">About Me Section</h1>
            
            <div class="row">
                <?php
                if (!$con) {
                    echo "Failed to connect to the database";
                } else {
                    // Fetch data from the database
                    $result = mysqli_query($con, "SELECT * FROM projects"); // Replace 'aboutme' with the actual table name

                    if ($result) {
                ?>
                <div class="col-lg-5 mx-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>project title</th>
                                <th>project description</th>
                                <th>Project Image</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['project_title']}</td>";
                                echo "<td>{$row['project_description']}</td>";
                                echo "<td>{$row['project_img']}</td>";
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
               

               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
