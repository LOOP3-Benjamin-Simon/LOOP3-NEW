<?php 
require_once('includes/header.php');

//print_r($_POST);


if (isset($_POST['fornavn']) && isset($_POST['efternavn']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firma']) && isset($_POST['cvr_nummer'])) {
    $fornavn = $_POST['fornavn'];
    $efternavn = $_POST['efternavn'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firma = $_POST['firma'];
    $cvr_nummer = $_POST['cvr_nummer'];


    $token = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO kunde_id (email, password) VALUES ('$email', '$token')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        $errorcode = mysqli_errno($con);
        if ($errorcode === 1062) {
            echo "<p class='error'>This email address is already registered in the system, please login.</p>";
            require_once('includes/footer.php');
            die();
        } else {
            echo "<p class='error'>Couldn't register user: " . mysqli_error($con) . ".</p>";
            require_once('includes/footer.php');
            die();
        }
    }
    if ($result === TRUE) {
        $user_id = mysqli_insert_id($con);
        $query2 = "INSERT INTO frontend_blivkunde (kunde_id, fornavn, efternavn, firma, cvr_nummer) VALUES ('$user_id', '$fornavn', '$efternavn', '$firma', '$cvr_nummer')";
        mysqli_query($con,"INSERT INTO approvals (kunde_id) VALUES ('$user_id');");
        $result2 = mysqli_query($con, $query2);
        if (!$result2) {
            echo "<p class='error'>Couldn't register user: " . mysqli_error($con) . ".</p>";
            require_once('includes/footer.php');
            die();
        } else {
            echo "<p class='welcome'>Tak for din ansøgning om at blive kunde hos StrainMonitoring. Du vil modtage et login, når du er godkendt.</p>";
        }
    } 
} else {
    
?>


<main role="main">
    <main class="flex-shrink-0">
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h1 class="fw-bolder">Bliv kunde</h1>
                        <p class="lead fw-normal text-muted mb-5">Udfyld venligst nedenstående formular for at blive oprettet som kunde hos StrainMonitoring</p>
                    </div>
                    <fieldset>
                        <form class="row g-3 needs-validation" novalidate action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <label for="validationCustom01" class="form-label">Fornavn</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="fornavn" placeholder="Skriv her" required>
                                    <div class="valid-feedback"></div>
                                </div>
                                <div class="col">
                                    <label for="validationCustom02" class="form-label">Efternavn</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="efternavn" placeholder="Skriv her" required>
                                    <div class="valid-feedback"></div>
                                </div>
                                <div class="col">
                                    <label for="validationCustom01" class="form-label">Firma</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="firma" placeholder="F.eks. Aarhus Universitet" required>
                                    <div class="valid-feedback"></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="email" class="form-control" id="validationCustomUsername" name="email" placeholder="Skriv her" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Indtast venligst din email-adresse.
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="validationCustomPassword" class="form-label">Password</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">?</span>
                                        <input type="password" class="form-control" id="validationCustomPassword" placeholder="Skriv her" name="password" aria-describedby="inputGroupPrepend" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Din kode skal indeholde mindst ét tal, ét stort samt ét lille bogstav samt være på mindst 8 tegn." required>
                                        <div class="invalid-feedback">
                                            Din kode skal indeholde mindst ét tal, ét stort samt ét lille bogstav samt være på mindst 8 tegn.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="validationCustom03" class="form-label">CVR-nummer</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="cvr_nummer" aria-describedby="inputGroupPrepend" pattern=".{8}" placeholder="Skriv 8-cifret CVR-nummer her" required>
                                    <div class="invalid-feedback">
                                        CVR-nummeret skal bestå af 8 cifre.
                                    </div>
                                </div>
                            </div>
                            
                <br>
                <br>
                <br>
                <br>
                            <div class="col-12">
                                <button class="btn btn-warning" type="submit">Send anmodning</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </section>
    </main>
</main>

<br>
<br>
<br>
<br>
<br>
<br>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>


<?php
}
require_once('includes/footer.php');
?>