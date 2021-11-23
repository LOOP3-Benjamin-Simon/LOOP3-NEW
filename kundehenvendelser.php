<?php
require_once('includes/admin_header.php');


if (!isset($_SESSION['admin_status'])) {
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



<section class="py-5">
    <div class="container px-5 my-5">
                    <div class="text-left mb-5">
                        <h1 class="fw-bolder text-center">Kundehenvendelser</h1>
                        <main class="px">
                             <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Besked ID</th>
                                            <th scope="col">Navn</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefonnummer</th>
                                            <th scope="col">Tidspunkt</th>
                                            <th width="400px" scope="col" >Besked</th>
                        
                                        </tr>
                                    </thead>
                    
                    
                                    <tbody>
                    
                                        <?php
                        
                                        $query = "SELECT * FROM kontakt_os;";
                                        $result = mysqli_query($con, $query);
                                        if (!$result) die (mysqli_error($con));
                                        $rows = mysqli_num_rows($result);
                                        if ($rows > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {

                                                /* Besked-id centreres med class'en 'text-center' da vi ønsker at tallet skal stå i midten af kolonnen*/
                                                echo "
                                                    <tr>
                                                        <td class ='text-center'>".$row['besked_id']."</td>
                                                        <td>".$row['fornavn']. ' '  .$row['efternavn']."</td>
                                                        <td>".$row['email']."</td>
                                                        <td>".$row['telefonnummer']."</td>
                                                        <td>".$row['reg']."</td>
                                                        <td>".$row['besked']."</td>
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





<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script  src="js/script.js"></script>

</html>
    
<?php
  }
require_once('includes/footer.php');
?>



