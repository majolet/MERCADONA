<?php
   session_start();
   include_once "./config/dbconnect.php";
   if(isset($_GET['logout'])) {
    session_destroy();
    header("Refresh: 3; index.html");
    echo "Vous avez été déconnecté avec succès.";
    exit();
    }

?>

  
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color:lightgray">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./img/logmercadona.png"  alt="" style="display:block">
    </a>
    <p style="font-size:30px;">Console d'administration</p>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:red;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="?logout=true" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:red;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
