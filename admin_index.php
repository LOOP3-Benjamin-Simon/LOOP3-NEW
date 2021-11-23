<?php
require_once('includes/admin_header.php');

if (!isset($_SESSION['admin_id'])) {
    echo "<p class='error'>You need to be logged in to get access to this page.</p>";
    require_once('includes/footer.php');
    die();
}



if ($_SESSION['admin_status'] = 0 ) {
    echo "<p class='error'>Du har ikke administrator-rettigheder og har derfor ikke adgang til denne side.</p>";
    require_once('includes/footer.php');
    die();
} else {

?>


<section class="bg-light py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Velkommen administrator</h1>
                        <p class="lead fw-normal text-muted mb-0">Du har nu alle rettigheder - brug dem med omtanke</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <!-- Pricing card free-->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="small text-uppercase fw-bold text-muted">Webhotel</div>
                                    <div class="mb-3">
                                        <span class="display-6 fw-bold">Simply.com</span>
                                    </div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Administration
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Driftsstatus
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Statistik
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            File manager
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Website email
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Logdata
                                        </li>
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-warning" href="https://www.simply.com/dk/controlpanel/strainmonitoring.dk/admin/" target="_blank">Gå til webhotel</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing card pro-->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Database</div>
                                    <div class="mb-3">
                                        <span class="display-6 fw-bold">MySQL</span>
                                    </div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Administrér profilrettigheder
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Databaseoversigt
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Rediger datatabeller
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Opret nye datatabeller
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Database-design
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Backend-redigering
                                        </li>
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-warning" href="https://mysql.simply.com/index.php" target="_blank">Gå til MySQL</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



<?php
}
require_once('includes/footer.php');
?>