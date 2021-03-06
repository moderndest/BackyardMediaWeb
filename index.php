<!--
    - Backyard Media 
    - Filename: index.php
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: May 29 2018 
    - For the full copyright and license information, please view the LICENSE  
-->

<?php
require_once './phpControl/Includes/authenticate.php'
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
        
        <!-- lottieJS -->
        <script src="js/lottie_light.min.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="css/section1style2.css" />
        <link rel="stylesheet" href="css/section1style.css">
  
        <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
        <style>
        .container{
    overflow: hidden;
}
.filterDiv {  
    width: 100%;  
    height: 100%;  
    display: none; /* Hidden by default */
}

/* The "show" class is added to the filtered elements */
.show {
    
    display: block;
}

/* Style the buttons */
#myBtnContainer .btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

/* Add a light grey background on mouse-over */
#myBtnContainer .btn:hover {
  background-color: #ddd;
}

/* Add a dark background to the active button */
#myBtnContainer .btn.active {
  background-color: orange;
  color: white;
}
        </style>
       
    </head>
   
    <body>
        
        <!-- header starts here -->
        <header>
            <!---  Navigation Start here  ---->  
            <nav class="tm-content1 navbar fixed-top navbar-expand-lg bg-custom">
                <a class="navbar-brand mx-md-2" href="index.php">
                    <img src="img/logo.png">
                </a>
                <button class="navbar-toggler  custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars fa-2x white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-md-4 mx-0">
                            <a class="nav-link" href="AboutUs.php">AboutUs</a>
                        </li>
                        <li class="nav-item dropdown mr-md-4 mx-0">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    Podcasters

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
    
    
    

        <!-- Body Content Start here -->
        <ul class="cb-slideshow section1">
            
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	        </ul>
        <div id="particles-js"></div>
        <!-- section1 -->
        <div class="container-fluid">
            
            <div class="row cb-slideshow-text-container">
               
                            
                <div class="branding col-12">
                    <p class="col-md-12 d-flex justify-content-center brand_heading">
                        Back Yard Media
                    </p>
                    <p class="col-md-12 d-flex justify-content-center brand_caption">
                        Best Marketplace for Podcast Advertisers
                    </p>
                </div>
                
                
                <div class="tm-content btn_adv_pod col-md-12 d-flex justify-content-center">
                    <a href="advertiser.php" class="col-5 col-md-4 mr-4 btn btn-outline-warning btn-md" role="button"  id="adv">ADVERTISER</a>
                    <a href="podcaster.php" class="col-5 col-md-4 btn btn-outline-warning btn-md" role="button" id="pod">PODCASTER</a>

                </div>
                
            </div>
        </div>
        <!-- end of section1 -->

        <!-- section2 Slidebar -->
        
        <div class="bg-slidebar">
            <h2 class="podfeat offset-1">Featured Podcasts</h2>
            <div class="container-fluid">
            
                
                <div id="my-slider" class="carousel slide  " data-ride="carousel">
                    <!-- wrapper for slides -->
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <div class="media ">
                                <div class="row w-100">
                                    <div class="p-4 d-flex col-12 col-sm-12 offset-md-1 col-md-4  justify-content-center" href="#">
                                        <img src="img/BushLeague_logo.jpg" style="width:300px; height:300px;" alt="First slide">
                                    </div>
            
                                    <div class="media-body p-4 col-12 col-sm-12 col-md-7  ">
            
                                        <h3>Bush League   <a href="https://itunes.apple.com/us/podcast/bush-league-the-podcast/id1115373843?mt=2" class="fas fa-headphones"></a></h3>
                                        <p class="slide-description mt-4">Bush League is a narrative audio series about interesting and unheard stories from sports. We features stories that exist where sports intersects with politics, geography, culture, business and drama.
                                            <br>
                                            <br>
                                            Listen on <a href="https://itunes.apple.com/us/podcast/bush-league-the-podcast/id1115373843?mt=2">iTunes</a> 
                                            or <a href="https://soundcloud.com/bushleague_thepodcast">Soundcloud</a>. Check out <a href="https://www.bushleaguethepodcast.com/">Bush League's website </a> for more content.
                                        </p>
                                        
                                        <a class="my-3 btn btn-warning subtitle-slide" href="#"><h6>Advertise on Bush League </h6></a>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="media">
                                <div class="row w-100">
                                   
                                    <div class="p-4 d-flex col-12 col-sm-12 offset-md-1 col-md-4 justify-content-center" href="#">
                                        <img src="img/FirstMondays.png" style="width:300px; height:300px;" alt="Second slide">
                                    </div>
                                   
                                    <div class="media-body p-4 col-12 col-sm-12 col-md-7">
            
                                        <h3>First Mondays <a href="https://itunes.apple.com/us/podcast/first-mondays/id1161435501?mt=2" class="fas fa-headphones"></a></h3>

                                        <p class="slide-description mt-4">First Mondays is an entertaining podcast about the Supreme Court, co-hosted by Ian Samuel,
                                            a former law clerk for Justice Scalia, and Dan Epps, a former law clerk for Justice Kennedy. Each episode, we discuss
                                            the Court’s business that week: cases it agrees to hear, oral arguments, its opinions, and much more.
                                            <br>
                                            <br>
                                            Listen on <a href="https://itunes.apple.com/us/podcast/first-mondays/id1161435501?mt=2">iTunes</a> 
                                            . Check out <a href="http://www.firstmondays.fm/">First Mondays's website </a> for more content.
                                        </p>
                                        <a class="my-2 btn btn-warning" href="#"><h6>Advertise on First Mondays </h6></a>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="carousel-item">
                            <div class="media">
                                <div class="row w-100">
                                   
                                    <div class="p-4 d-flex col-12 col-sm-12 offset-md-1 col-md-4 justify-content-center" href="#">
                                        <img src="img/Global.png" style="width:300px; height:300px;" alt="Third slide">
                                    </div>
                                   
                                    <div class="media-body p-4 col-12 col-sm-12 col-md-7">
            
                                        <h3>Global Dispatches <a href="https://itunes.apple.com/us/podcast/un-dispatch-podcast/id593535863?mt=2" class="fas fa-headphones"></a></h3>

                                        <p class="slide-description mt-4">A podcast about world affairs and the people who shape it.
                                            <br>
                                            <br>
                                            Listen on <a href="https://itunes.apple.com/us/podcast/un-dispatch-podcast/id593535863?mt=2">iTunes</a> 
                                            . Check out <a href="http://www.globaldispatchespodcast.com/">Global Dispatches's website </a> for more content.
                                        </p>
                                        <a class="my-2 btn btn-warning" href="#"><h6>Advertise on Global Dispatches </h6></a>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                    </div>
                    <!-- controls or next and prev buttons -->
                   
                    <a class="carousel-control-prev" href="#my-slider" role="button" data-slide="prev">
                        <span class="fas fa-arrow-circle-left fa-3x black" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#my-slider" role="button" data-slide="next">
                        <span class="fas fa-arrow-circle-right fa-3x black" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
    
                        
            
            </div>
        </div>
        <!-- end of section2 Slidebar -->

        <!-- Section3 ContactUs -->
        <div class="contact">
            
            <div class="container">
                <div class="row">
                    <div class="my-4 col-12 col-sm-12 col-md-7">
                        <h2 class="my-4 ">
                            Contact Us
                            <i class=" mx-2 far fa-envelope-open"></i>
                        </h2>
                        <!-- Contact Form Start here -->
                        <form class="contact-form " action="phpControl/contact.php" method="post" role="form" novalidate>

                            <!-- Alert Message -->
                            <div class="messages"></div>
                            <!-- Name -->
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Name is required.
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid email is required.
                                    </div>
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="form-group row">
                                <label for="inputNote" class="col-sm-2 col-form-label">Notes</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="notes" id="inputNote" rows="5" required></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please,leave us a message.
                                    </div>
                                </div>
                            </div>
                                    
                            <!-- submit button -->
                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2 d-flex justify-content-end">
                                <button type="submit" value="Send message" class="submitemail btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                         <!-- End of Contact Form here -->
                    </div>
                        
                    <!-- Animtion letter -->
                    <div class="my-5 letterani col-12 col-sm-12 col-md-5 justify-content-center">
                        <!-- <i class="far fa-envelope-open fa-6x"></i> -->
                        <div class="bg-letter d-flex justify-content-center">
                            <div id="lottie"></div>
                            <script> 
                                lottie.loadAnimation({
                                container: document.getElementById('lottie'), // the dom element that will contain the animation
                                renderer: 'svg',
                                loop: true,
                                autoplay: true,
                                path: 'js/letter.json' // the path to the animation json
                                });
                            </script>
                        
                        </div>
                        
                    </div>
                     <!-- Animtion letter -->
                </div>
                
            </div>  
        </div>


     <!-- end of Body Contet -->
        
        
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
        <script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <script src="js/contact.js"></script>
        <script src="js/validator.js"></script>
        
        
         
        
    </body>
</html>