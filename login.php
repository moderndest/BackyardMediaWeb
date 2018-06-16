

<!--
    - Backyard Media 
    - Filename: login.php
    - @author: Haocheng Li
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: June 5 2018    
    - For the full copyright and license information, please view the LICENSE
-->


<?php
require_once './php/includes/init.php';
use php\Sessions\AutoLogin;

if (isset($_POST['login'])){
    $username = trim($_POST['username']);
    $pwd = trim($_POST['pwd']);
    $stmt = $db->prepare('SELECT pwd FROM users WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $stored = $stmt->fetchColumn();
    if(password_verify ($pwd,$stored)){
        //session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['authenticated'] = true;

        if(isset($_POST['remember'])){
            //create persistent login
            $autologin = new Autologin($db);
            $autologin->persistentLogin();
        }
       
        header('Location: index.php');
        exit;
           
    }else {
        $error = 'Login failed. Check username and password.';
    }
}

?>

<!Doctype html>
<html>


    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Backyard Media</title>
        <link rel="stylesheet" href="style.css">
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/nav.js"></script>   
       
    </head>
    
  
     <body>
        
     <!-- header starts here -->
        <header>
            
        <nav class="navbar fixed-top navbar-expand-lg bg-custom">

            <a class="navbar-brand mx-md-2" href="index.php">

                <img src="img/logo.png">
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars fa-2x white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-md-4 mx-0">
                        <a class="nav-link" href="AboutUs.php">AboutUs</a>
                    </li>
                    <li class="nav-item dropdown mr-md-4 mx-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Podcasts

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">News</a>
                                <a class="dropdown-item" href="#">Laws</a>
                                <a class="dropdown-item" href="#">Technology</a>
                                <a class="dropdown-item" href="#">Art</a>
                                <a class="dropdown-item" href="#">All</a>
                            </li>
                    <li class="nav-item mr-md-4 mx-0">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                    <li class="nav-item mr-md-4 mx-0">
                        <a class="nav-link" href="Faqs.php">Faqs</a>
                    </li>
                    <li class="nav-item mr-md-4 mx-0">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                    <div class="loginbtn">
                        <a href="login.php" class="d-inline btnstyle" role="button">Log in</a>
                    </div>



                    <div class="vl mx-2"></div>

                    <div class="Signupbtn"> 
                        <a href="Signup.php" class="d-inline btnstyle" role="button">Sign Up</a>
                    </div>
            </div>
        </nav>

        <!--- end of header Navigation---->
        
        </header>
        
    <!-- end of the header -->
     
         
    <!-- body container-->

        <div class="container-fluid " >
            <h1 class="pagetitle">Advetisers Login</h1>

            <div class="row loginform justify-content-center">
                 <!-- Alert -->
                 <?php
                        if (isset($error)){
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo $error;
                            echo "</div>";
                        }
                ?>
                <form class="col-md-12 contact-form" action="<?= $_SERVER['PHP_SELF']?>" method="post" novalidate>

                    <!-- Username -->
                    <div class="form-group row justify-content-center">
                        <label for="username" class="ml-3 col-sm-2 col-md-2 col-lg-1 col-form-label">Username</label>
                        <div class="col-sm-5 mr-2">
                            <input type="text" class="form-control col-lg-10" id="username" name= "username" placeholder="Username" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     username is required.
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group row justify-content-center">
                        <label for="pwd" class="ml-3 col-sm-2 col-md-2 col-lg-1 col-form-label">Password</label>
                        <div class="col-sm-5 mr-2">
                            <input type="password" class="form-control col-lg-10" id="pwd" name="pwd" placeholder="Password" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     password is required.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="form-check row d-flex justify-content-center my-3">
                        
                            <div>
                                <input type="checkbox" class="form-check-input d-inline justify-content-center" name="remember" id="remember">
                            </div>
                            <div>
                                <label class="form-check-label d-inline justify-content-center" for="remember">Remember me</label>
                            </div>

                    </div>
                    
                    <!-- SignIn btn --> 
                    <div classs="form-group row justify-content-center">
                        <div class="col-12 d-flex justify-content-center">
                            <input class=" col-5 col-md-4 col-lg-3 btn btn-md Submitloginbtn " name="login" id="login" type="submit" value="Sign In">
                        </div>
                    </div>
                </form>
                <div class="col-12 p-4 d-flex justify-content-center">
                    <p>Do you have an account? <a rel="nofollow" href="Signup.php" target="_parent">Sign Up</a></p>
                </div>
            </div>
        </div>



    
    <!--- Footer part -->
        
    <footer>
        <div>
            <!-- <img src="img/logo.png"> -->
            <p class="copy_right">Copyright © Backyard Media 2018</p>
            <div class="d-flex justify-content-center">
            <a href="https://www.facebook.com/backyardmediacompany/" class="facebook fab fa-facebook-square fa-2x mr-2"></a>
            <a href="#" class="twitter fab fa-twitter-square fa-2x"></a>
            </div>
        </div>
    </footer>

    <!-- End of the footer  -->

    <script src="js/validator.js"></script>
    </body>
</html>
