<?php require_once "../../includes/header.php"; ?>
<?php require_once "../../includes/nav.php"; ?>
<?php require_once __DIR__ . '/../../index.php'; ?>


<?php require_once "../../../includes/db.php"; // Adjust the path as needed ?>


</nav>
</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-5 text-center">SYSTEM INFO</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">NAVIGATION BAR</li>
            </ol>
            <div class="row">
                <?php
                // Assuming $con is defined in the db.php file
                if (!$con) {
                    echo "Failed to connect to the database";
                } else {
                    // Fetch data from the database
                    $result = mysqli_query($con, "SELECT * FROM aboutme"); // Replace 'aboutme' with the actual table name

                    if ($result) {
                ?>
                <div class="col-lg-5 mx-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Navigation ID</th>
                                <th>Navigation Name</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['about_id']}</td>";
                                echo "<td>{$row['about_title']}</td>";
                                echo "<td><a href='edit.php?id={$row['about_id']}' class='btn btn-primary'>Edit</a></td>"; // Added the edit button
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
            </div>
        </div>
    </main>
</div>
