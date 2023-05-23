<?php
  // connexion 
  
  session_start();

  //db connexion
  $bdd= new PDO ('mysql:host=localhost;dbname=swiss_collection','root');
  //verification de connexion
  if (!$bdd) {
    die("Connection failed: " );
  }
 ;
  //form sending
  if(isset($_POST['send'])){
  if(!empty($_POST['username'] and !empty($_POST['password']))){
  $username=htmlspecialchars($_POST['username']);
  $password=($_POST['password']);
  $RecupUser=$bdd->prepare('SELECT username,password FROM users WHERE username=? AND password=?');
  $RecupUser->execute(array($username,$password));
  
  if($RecupUser->rowCount()>0){
      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
      $_SESSION['loggedin'] = true;
      header('location: index.php');
  } else {
    echo "Votre mot de passe ou login est incorrect";
  };
  
    };
   };

?>

<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="utf-8">
    <title>MERCADONA-connexion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">A propos</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Aide</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Mon compte</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">S'inscrire</button>
                        </div>
                    </div>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                    <img src="./img/logmercadona.png" class="img-fluid" alt="logo">
                
            </div>

            <div class="col-lg-4 col-6 text-right justify-content-end">
                <p class="m-0">Service client</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-light m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Mode <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Homme</a>
                                <a href="" class="dropdown-item">Femme</a>
                                <a href="" class="dropdown-item">Enfant</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">hygiène, beauté</a>
                        <a href="" class="nav-item nav-link">jardin et exterieur</a>
                        <a href="" class="nav-item nav-link">Multimédia</a>
                        <a href="" class="nav-item nav-link">Maison</a>
                        <a href="" class="nav-item nav-link">Sport</a>
                        <a href="" class="nav-item nav-link">Boissons</a>
                        <a href="" class="nav-item nav-link">jeux, jouets</a>
                        <a href="" class="nav-item nav-link">Bijoux</a>
                        <a href="" class="nav-item nav-link">Chaussures</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <img src="./img/logmercadona.png"  alt="logo" height="100px" width="200px">
                    </a>
 
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->




    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                    <h2 class="text-center">Bienvenue sur votre espace de connexion</h2>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <div id="container">
      <!-- zone de connexion -->
      
      <form action="" method="POST" enctype="multipart/form-data">

      
      <label><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="admin" name="username" required>
     
      <label><b>Mot de passe</b></label>
      <input type="password" placeholder="12345" name="password" required>


      <input type="submit" id='submit' value='Se connecter' name="send" >

      </form>

    <style>
      body{
 background: #ffffff;
}
#container{
 width:400px;
 margin:0 auto;
 margin-top: 5%;
 margin-bottom: 100px;
}
/* Bordered form */
form {
 width:100%;
 padding: 30px;
 border: 1px solid #f1f1f1;
 border-radius: 20px;
 background: #fff;
 box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
#container h1{
 width: 38%;
 margin: 0 auto;
 padding-bottom: 10px;
}

/* Full-width inputs */
input[type=text], input[type=password] {
 width: 100%;
 padding: 12px 20px;
 margin: 8px 0;
 display: inline-block;
 border: 1px solid #ccc;
 box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit] {
 background-color: #c0001a;
 color: white;
 padding: 14px 20px;
 margin: 8px 0;
 border: none;
 cursor: pointer;
 width: 100%;
}
input[type=submit]:hover {
 background-color: white;
 color: #c0001a;
 border: 1px solid #c0001a;
}
    </style>
      </div>
     



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">MERCADONA</h5>
                <p class="mb-4"></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 calle, Madrid, Spain</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@mercadona.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Accès rapide</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Accueil</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Magasin</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Mon panier</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Mon compte</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">informations</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>conditions générales d'utilisations </a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Conditions générales de vente</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Nos engagements</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Notre politique de retour</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Ne ratez pas nos dernières promotions en vous inscrivant à la Newsletter !</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Votre adresse email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">S'enregistrer</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Nous suivre</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#"></a>. Tous droits réservés
                    by
                    <a class="text-primary" href="">PromoWeb</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>