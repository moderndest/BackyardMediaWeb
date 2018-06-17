<!--
    - Backyard Media 
    - Filename: contact.html
    - @author: Haocheng Li
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: May 29 2018    
    - For the full copyright and license information, please view the LICENSE
-->

<?php
require_once './phpControl/includes/authenticate.php'
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
                                Podcast
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
     
         
    <!-- body container-->
        <h1 class="pagetitle">CONTACT US</h1>

         
        <div class="container">
            <div class="row justify-content-center">
                <form class="col-9 contact-form" action="phpControl/contactUs.php" method="post" role="form" novalidate>
                    
            
                    <!-- first name -->
                    <div class="form-group row p-1">
                        <div class="col-12">
                            <h5>Name*</h5>
                            <div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="name" placeholder="FirstName LastName"  required>
                                <div class="valid-feedback">
                                    
                                </div>
                                <div class="invalid-feedback">
                                    Name is required.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--email  -->
                    <div class="form-group row p-1">
                        <div class="col-12">
                            <h5>Email*</h5>
                            <div>
                                <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="email" placeholder="Email" required>
                                <div class="valid-feedback">
                                        
                                </div>
                                <div class="invalid-feedback">
                                    Valid email is required.
                                </div>
                        </div>
                        </div>
                    </div>
                    <!--nameofcontract  -->
                    <div class="form-group row p-1">
                        <div class="col-12 ">
                            <h5>Name of Organizaiton</h5>
                            <div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="organizaiton" placeholder="Name of Organization">
                            </div>
                        </div>
                    </div>
                    <!-- are you -->
                    <fieldset class="form-group row p-1">
                        <h5 class="col-12">Are You?*</h5>
                        <div class="col-sm-5 " >
                            
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="gridRadios" value="Podcaster" id="Podcaster" required>
                                <label class="form-check-label" for="Podcaster">A Podcaster</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" value="Sponsor"  id="Sponsor" required>
                                <label class="form-check-label" for="Sponsor">A Potential Sponsor</label> 
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" value="Other"  id="Else"required >
                                <label class="form-check-label" for="Else">Someone else</label> 
                            </div>

                            <div class="valid-feedback">
                                    
                            </div>
                            <div class="invalid-feedback">
                                    Are you? is required.
                            </div>
                        </div>
                    </fieldset>

                    <!-- website -->
                    <div class="form-group row p-1">
                        <div class="col-12">
                            <h5>Website</h5>
                            <div><input type="url" name="website" class="form-control" pattern="https?://.+" placeholder="https://example.com/"></div>
                        </div>
                    </div>
                    <!-- message -->
                    <div class="form-group row p-1">
                        <div class="col-12">
                            <h5>Message*</h5>
                            <p><i>How can we help you?</i></p>
                            <div>
                                <textarea class="col-12 form-control" rows="10" name="notes" placeholder="Message" required></textarea>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                        Please,leave us a message.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="form-group row p-2">
                        <div class="col-sm-8">
                        </div>
                        <div class="col-sm-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline Submitbtn btn-lg">Submit</button>
                        </div>
                    </div>

                    <!-- Alert Message -->
                    <div class="messages"></div>
                </form>
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
    <script src="js/contact.js"></script> 
    
    
    
    </body>
</html>
