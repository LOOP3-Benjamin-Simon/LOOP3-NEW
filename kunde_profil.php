<?php

require_once('includes/kunde_header.php');

if (!isset($_SESSION['kunde_id'])) {
    echo "<p class='error'>You need to be logged in to get access to this page.</p>";
    require_once('includes/footer.php');
    die();
}

if ($_SESSION['kunde_status'] = 0 ) {
    echo "<p class='error'>Du har ikke kunde-rettigheder og har derfor ikke adgang til denne side.</p>";
    require_once('includes/footer.php');
    die();
} else {


?>


<section class='py-5'>
    <div class='container px-5 my-5'>
        <div class='text-center mb-5'>
            <h1 class='fw-bolder'>Kundeoplysninger</h1>
                <p class='lead fw-normal text-muted mb-0'>Her kan du se dine kundeoplysninger</p>
        </div>
    </div>
</section>


<?php
}
require_once('includes/footer.php');
?>