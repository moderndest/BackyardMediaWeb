<!--
    - Backyard Media 
    - Filename: Faqs.html
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: May 29 2018   
    - For the full copyright and license information, please view the LICENSE
-->

<?php
require_once './phpControl/includes/authenticate.php'

if (isset($_POST['submit']))
{
    foreach($_POST['submit'] as $key => $value)
    {
        $i=$value;
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
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/nav.js"></script>   
       
    </head>
   
    
    <body>

  <!-- header starts here -->
        <header>
            <!---  Navigation Start here---->
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
                    <?php
                        if (isset($_SESSION['username']))
                        {
                            
                            echo "<p class='blue'>";
                            echo "<i class='fas fa-user fa-2x blue mr-2'></i>";
                            echo   htmlentities($_SESSION['username']);
                            echo "</p>";

                            include './phpControl/includes/logout_button.php';
                        
                        }
                        else{
                            echo "<div class='loginbtn'>";
                            echo "<a href='login.php' class='d-inline btnstyle' role='button'>Log in</a>";
                            echo "</div>";
                            echo "<div class='vl mx-2'></div>";
                            echo "<div class='Signupbtn'> ";
                            echo  "<a href='Signup.php' class='d-inline btnstyle' role='button'>Sign Up</a>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </nav>

            <!--- end of header Navigation---->
        
        </header>
        
    <!-- end of the header -->
        
    
    <!-- Body content start here-->

        <h1 id="pageTitle" align="center">Podcast</h1>

        <div class="container">
            <div class="row">

                <?
                    echo "<div class='row filterDiv p-5'>";
                             
                    echo "<div class='row col-md-12  p-4''>";
                    //////////////// Image /////////////////////////////
                    echo "<div class='my-4 col-sm-12 col-md-4 justify-content-center'>";
                    echo "<img class='rounded' style='width: 300px; height: 300px;' src='data:image/jpeg;base64,".base64_encode($pod[$i]['img'])."'>";
                    echo "</div>";


                    //////////////// Podcast Info /////////////////////////////
                    echo "<div class='col-sm-12 col-md-8'>";
                    // show
                    echo "<h3 style='color: orange;'>".$pod[$i]['Show']."</h3>";

                    //Description
                    
                    echo "<p id='#'>".$pod[$i]['Description']."</p>";

                    //Release Shedule
                    // echo "<p id='#'> </p> ";
                    echo "<p> <strong>Release Schedule : </strong>".$pod[$i]['Release_Schedule']."</p>";

                    //Downloads per Episode
                    echo "<p id='#'> </p> ";
                    echo "<p id='#'> <strong>Dowloads per Episode : </strong>".$pod[$i]['Downloads_Episode']."</p>";

                    // Demographic
                    echo "<p id='#'><strong>Demographic Listenership : </strong> </p> ";
                    echo "<p id='#'>".$pod[$i]['Demographic_listenership']."</p>";


                    //Pre Roll Price
                    echo "<p id='#'><strong>Pre Roll : </strong>";
                    
                    if (isset($pod[$i]['Total_PreRoll_Cost']))
                    {
                        echo "$".$pod[$i]['Total_PreRoll_Cost']."</p>";
                    } else {
                        echo "N/A </p>"; 
                    }

                    //Mid Roll Price
                    echo "<p id='#'><strong>Mid Roll : </strong>";

                    if (isset($pod[$i]['Total_MidRoll_Cost']))
                    {
                        echo "$".$pod[$i]['Total_MidRoll_Cost']."</p>";
                    } else {
                        echo "N/A </p>"; 
                    }

                    echo "</div>";
        
                    
                    echo "</div>";
                    echo '<hr>';
                    echo "</div>";
                ?>
        
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
    </body>
</html>
