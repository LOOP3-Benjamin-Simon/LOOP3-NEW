<?php

require_once('includes/kunde_header.php');

if (!isset($_SESSION['kunde_id'])) {
    echo "<p class='error'>You need to be logged in to get access to this page.</p>";
    require_once('includes/footer.php');
    die();
}

if ($_SESSION['kunde_status'] == '0' ) {
    echo "<p class='error'>Du har ikke kunde-rettigheder og har derfor ikke adgang til denne side.</p>";
    require_once('includes/footer.php');
    die();
} else {


?>

<?php
$user_id = $_SESSION['kunde_id'];
$query = "SELECT * FROM kunde_info WHERE kunde_id=$user_id;";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$kunde_id = $row['kunde_id'];
$fornavn = $row['fornavn'];
$efternavn = $row['efternavn'];


if ($_SESSION) {
    echo "
        <section class='py-5'>
            <div class='container px-5 my-5'>
                    <div class='text-center mb-5'>
                        <h1 class='fw-bolder'>Velkommen, " . $fornavn . " " . $efternavn . "</h1>
                        <p class='lead fw-normal text-muted mb-0'>Du er nu logget ind som kunde</p>
                    </div>
            </div>
        </section>
    ";
    
}

?>



<main>
    <div class="col-lg-6 order-first order-lg-last">
        <img class="img-fluid rounded mb-5 mb-lg-0" src="images/kunde_index.png" alt="..." />
    </div>
    <br>
    <br>
</main>




<?php
}
require_once('includes/footer.php');
?>
