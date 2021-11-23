<?php 
    require_once('conn.php');
    $query = "
        SELECT * 
        FROM nyheder 
        ORDER BY timestamp DESC 
        LIMIT 3;";

    $results = mysqli_query($con,$query);
    if(!$results) die(mysqli_error($conn));
    while($row = mysqli_fetch_assoc($results)) {
        echo "<div class='col-lg-4 mb-5'>
                <div class='card h-100 shadow border-0'>
                    <img class='card-img-top' src='".$row['img_path']."' alt='".$row['img_name']."'/>
                        <div class='card-body p-4'>";
        echo "<div class='badge bg-warning bg-gradient rounded-pill mb-2 text-dark'>Nyhed</div>";
        echo "<a class='text-decoration-none link-dark stretched-link' href='#!'><h5 class='card-title mb-3'>".$row['title']."</h5></a>";
        echo "<p class='card-text mb-0'>".$row['content']."</p>";
        echo "</div>";
        echo "<div class='card-footer p-4 pt-0 bg-transparent border-top-0'>";
        echo "<div class='d-flex align-items-end justify-content-between'>";
        echo "<div class='d-flex align-items-center'>";
        echo "<img class='rounded-circle me-3' src='assets/favicon.ico' alt='...'>";
        echo "<div class='small'>";
        echo "<div class='fw-bold'>".$row['forfatter']."</div>";
        echo "<div class='text-muted'>".$row['timestamp']."</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
?>
