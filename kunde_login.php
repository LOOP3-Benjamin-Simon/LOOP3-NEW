<?php

require_once('includes/header.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email_temp = $_POST['email'];
    $password_temp = $_POST['password'];

    $query = "SELECT * FROM kunde_id WHERE email = '$email_temp'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p class='error'>MySQL Error: " . mysqli_error($con) . ".</p>";
        require_once('includes/footer.php');
        die();
    } elseif (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $kunde_id = $row['kunde_id'];
        $email = $row['email'];
        $password = $row['password'];

        $token = (password_verify($password_temp, $password));

        if ($token == $password) {
            $_SESSION['kunde_id'] = $kunde_id;
            $query2 = "SELECT * FROM kunde_id WHERE kunde_id = '$kunde_id'";
            $result2 = mysqli_query($con, $query2);
            if (!$result2) {
                echo "<p class='error'>MySQL Error: " . mysqli_error($con) . ".</p>";
                require_once('includes/footer.php');
                die();
            } else {
                $row2 = mysqli_fetch_assoc($result2);
                header("Refresh:0; url=kunde_index.php");
                /*echo "<p class='welcome'>Velkommen. Du er nu logget ind som kunde.</p>";*/
            }
        } else {
            echo "<p class='error'>Invalid username/password combination.</p>";
            require_once('includes/footer.php');
        }
    }
} else {

?>



<section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder">Log ind</h1>
                            <p class="lead fw-normal text-muted mb-0">Udfyld venligst email og kodeord for at logge ind på kundesiden</p>
                        </div>
                        <main class="flex-shrink-0"></main>
    <fieldset>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                </div>
            </div>

            <br>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 py-4 justify-content-center">
                    <button type="submit" class="btn btn-warning">Login</button>
                </div>
            </div>
        </form>
        




    </fieldset>
</main>
                    </div>
                </div>
</section>




<?php
}
require_once('includes/footer.php');
?>