<?php
//session_start();
include('authentication.php');
include('include/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
            if (isset($_SESSION['message'])) {
                echo '<h4 class="alert alert-success">'.$_SESSION['message'].'</h4>';
                unset($_SESSION['message']);
            }
            ?>
            <h2>Home Page</h2>
        </div>
        
    </div>
</div>

<?php   
include('include/footer.php');
?> 