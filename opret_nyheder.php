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
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Opret nyhed</h1>
                        <p class="lead fw-normal text-muted mb-0">Opret nyheder dynamisk direkte til hjemmesiden</p>
                        <form action='opret_nyheder.php' method='post' class='form'>
                            <div class='row'>
                                <label for='image'>Billede</label>
                                <input type='file' name='image'>
                            </div>
                            <div class='row'>
                                <label for='title'>Nyhed title</label>
                                <input type='text' name='title'>
                            </div>
                            <div class='row'>
                                <label for='content'>Indhold</label>
                                <textarea name='content' cols='30' rows='10'></textarea>
                            </div>
                            <div class='row'>
                                <label for='author'>Forfatter</label>
                                <input type='text' name='author'>
                            </div>
                            <div class='row'>
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>

             </div>
</section>


<?php
    //get image
    $file = $_FILES['image'];
    echo $file;

    //store the image in the webhotel file system
        // store file $file in path "./bcjk/bcjaks/uploaded_images"

    //define variable with file path of image inside webhotel file system
        //$image_path = "./bcjk/bcjaks/uploaded_images"

    //upload form information to DB
        //new table: news
        // cols: title, content, author, timestamp (auto_generated), img_path, img_name
    
?>

<img src=$image_path alt="news_picture">





<?php 
  }
require_once('includes/footer.php');
?>