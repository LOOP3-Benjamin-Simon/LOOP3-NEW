<?php
require_once('includes/admin_header.php');
ob_start();


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

$result = mysqli_query($con,
"SELECT email,fornavn, efternavn 
FROM frontend_blivkunde 
    JOIN approvals ON frontend_blivkunde.kunde_id=approvals.kunde_id 
    JOIN kunde_id ON kunde_id.kunde_id=frontend_blivkunde.kunde_id 
WHERE approved=0");

?>


<section class="py-5">
            <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Opret nye kunder</h1>
                        <br>
                        <main class="px">
                            
                        
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kunde ID</th>
                                            <th scope="col">Fornavn</th>
                                            <th scope="col">Efternavn</th>
                                            <th scope="col">Firma</th>
                                            <th scope="col">CVR-nummer</th>
                                            <th scope="col">Tidspunkt</th>
                                            <th scope="col">Godkend/Afvis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        
                                        $query = "SELECT * FROM frontend_blivkunde";
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
                                                    <td>".$row['cvr_nummer']."</td>
                                                    <td>".$row['reg']."</td>
                                                    <td>
                                                        <div class='btn-group'>
                                                        <form method='post' action='opret_nye_kunder.php'>
                                                            <input type='number' hidden value=".$row['kunde_id']." name='kunde_id' />
                                                            <input class='btn btn-success' name='approve-btn' value='Approve' type='submit'/>
                                                        </form>
                                                        <form method='post' action='opret_nye_kunder.php'>
                                                            <input type='number' hidden value=".$row['kunde_id']." name='kunde_id' />
                                                            <input class='btn btn-danger onClick='window.location.reload()' name='reject-btn' value='Reject' type='submit'/>
                                                        </form>
                                                        </div>
                                                    </td>
                                                </tr>";
                                                }
                                        }
                        
                                        //process approve/reject form data
                                        if(isset($_POST['approve-btn'])){
                                            $result = mysqli_query($con,
                                                "SELECT * 
                                                FROM kunde_id 
                                                    JOIN frontend_blivkunde ON kunde_id.kunde_id=frontend_blivkunde.kunde_id
                                                WHERE kunde_id.kunde_id=".$_POST['kunde_id']." LIMIT 1;");
                                            $customer = mysqli_fetch_assoc($result);
                                            
                                            //update status to approve=1
                                            mysqli_query($con,"
                                                UPDATE kunde_id
                                                SET kunde_status=1
                                                WHERE kunde_id=".$customer['kunde_id'].";");
                        
                                            //enter into kunde_info only for approved customers
                                            mysqli_query($con,
                                                        "INSERT INTO kunde_info (fornavn, efternavn, cvr_no, firma, kunde_id)
                                                        VALUES (
                                                            '".$customer['fornavn']."',
                                                            '".$customer['efternavn']."',
                                                            '".$customer['cvr_nummer']."',
                                                            '".$customer['firma']."',
                                                            '".$customer['kunde_id']."');"
                                                        );
                        
                                            //delete from frontend_blivkunde, because only for "applicants"
                                            mysqli_query($con,"
                                                DELETE FROM frontend_blivkunde
                                                WHERE kunde_id=".$customer['kunde_id'].";
                                                ");
                                            echo "approve";
                        
                                            //refresh the page to display that the applicant is removed from the application list
                                            header("Refresh;");
                                        
                                        } 
                        
                                        if (isset($_POST['reject-btn'])) {
                                            //deletes from kunde_id table
                                            mysqli_query($con,"
                                                DELETE FROM kunde_id
                                                WHERE kunde_id=".$_POST['kunde_id'].";"
                                            );
                        
                                            //deletes from frontend_blivkunde table
                                            mysqli_query($con,"
                                                DELETE FROM frontend_blivkunde
                                                WHERE kunde_id=".$_POST['kunde_id'].";"
                                            );
                                            echo "reject";
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


