<?php
require_once('includes/admin_header.php');
session_unset();
session_destroy();
?>

<div class="container">
		<section class='py-5'>
            <div class='container px-5 my-5'>
                    <div class='text-center mb-5'>
                        <p class='lead fw-normal text-muted mb-0'>Du bliver nu logget af. Tak for dit besøg</p>
						<img src="images/loadingbuffering.gif" alt="">
                    </div>
            </div>
        </section>
	
	<?php 
	header("Refresh:1.5; url=index.php");
	?>

</div>

<?php
require_once('includes/footer.php');
?>