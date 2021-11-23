<!--
    <?php
require_once('includes/header.php');
if (!isset($_SESSION['admin_id'])) {
    echo "<p class='error'>You need to be logged in to get access to this page.</p>";
    require_once('includes/footer.php');
    die();
}

$user_id = $_SESSION['admin_id'];
$query = "SELECT * FROM admin_login";
$result = mysqli_query($con, $query);
if (!$result) die(mysqli_error($con));
else {
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $address = $row['address'];
            $post_code = $row['post_code'];
            $email = $row['email'];
            $city = $row['city'];
            $level = $row['level'];
            switch ($level) {
                case "1":
                    $season = "Admin";
                    break;
                case "2":
                    $season = "Summer";
                    break;
                case "3":
                    $season = "Autumn";
                    break;
                case "4":
                    $season = "Winter";
                    break;
                default:
                    $season = "";
            }

?>
            <main>
                <div class="container">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h2>Your Profile</h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $first_name . " " . $last_name; ?></h5>
                            <p class="card-text"><?php echo $email; ?></p>
                            <p class="card-text"><?php echo $address . ". " . $post_code . ", " . $city; ?></p>
                            <p class="card-text">Your favourite season is <strong><?php echo $season; ?></strong></p>
                        </div>
                    </div>

                </div>
            </main>

<?php
        }
    }
}
require_once('includes/footer.php');
?>
-->