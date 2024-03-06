<?php require_once "db.php"; ?>

<div class="hero-img"></div>
<div class="wrapper">
    <header>
        <a href="index.php" class="logo"><span></span></a>
        
        <nav>
            <svg class="close" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Your close button SVG path here -->
            </svg>

            <ul>
                <?php
                $query = "select * from aboutme";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $about_title = $row['about_title'];
                    echo "<li><a href='system_info'>{$about_title}</a></li>";
                }
                ?>
              
            
            <svg class="menu" viewBox="0 0 48 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Your menu button SVG path here -->
            </svg>
        </nav>
    </header>
</div>

<?php mysqli_close($con); ?>
