<?php
require_once('includes/admin_header.php');


if (!isset($_SESSION['admin_status'])) {
    echo "<p class='error'>You need to be logged in to get access to this page.</p>";
    require_once('includes/footer.php');
    die();
  }
  
  
  //checking session if user is an admin
  if ($_SESSION['admin_status'] = 0 ) {
    echo "<p class='error'>Du har ikke administrator-rettigheder og har derfor ikke adgang til denne side.</p>";
    require_once('includes/footer.php');
    die();
  } else {
?>



<section class="py-5">
    <div class="container px-5 my-5">
        <div class="text-left mb-5">
            <h1 class="fw-bolder text-center">Kundeoversigt</h1>
            <main class="px">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Kunde-ID</th>
                                <th scope="col">Fornavn</th>
                                <th scope="col">Efternavn</th>
                                <th scope="col">Firma</th>
                                <th scope="col">CVR-nummer</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            
                            $query = "SELECT * FROM kunde_id NATURAL JOIN kunde_info";
                            $result = mysqli_query($con, $query);
                            if (!$result) die (mysqli_error($con));
                            $rows = mysqli_num_rows($result);
                            if ($rows > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                            <tr>
                                                <td>".$row['kunde_id']."</td>
                                                <td>".$row['fornavn']."</td>
                                                <td>".$row['efternavn']."</td>
                                                <td>".$row['firma']."</td>
                                                <td>".$row['cvr_no']."</td>
                                                <td>".$row['email']."</td>
                                            </tr>
                                        ";
                                }
                            ?>
            
                            <?php
                            }
                            ?>
            
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</section>


</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script  src="js/script.js"></script>
</body>
</html>

<?php
  }
require_once('includes/footer.php');
?>