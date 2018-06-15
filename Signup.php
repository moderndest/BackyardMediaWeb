
<!Doctype html>
<html>
<!--
    - Backyard Media 
    - Filename: Signup.html
    - @author: Haocheng Li
    - (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: June 5 2018    
    - For the full copyright and license information, please view the LICENSE
-->
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Backyard Media</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/contactus.css">
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
            <a class="navbar-brand mx-md-2" href="index.html">
                <img src="img/logo.png">
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars fa-2x white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-md-4 mx-0">
                        <a class="nav-link" href="AboutUs.html">AboutUs</a>
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
                        <a class="nav-link" href="Faqs.html">Faqs</a>
                    </li>
                    <li class="nav-item mr-md-4 mx-0">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                </ul>
                    <div class="loginbtn">
                        <a href="login.html" class="d-inline btnstyle" role="button">Log in</a>
                    </div>
                    <!-- <i class="fas fa-user fa-2x blue"></i> -->
                    <div class="vl mx-2"></div>

                    <div class="Signupbtn"> 
                        <a href="Signup.html" class="d-inline btnstyle" role="button">Sign Up</a>
                    </div>
            </div>
        </nav>

        <!--- end of header Navigation---->
        
        </header>
        
    <!-- end of the header -->
     
         
    <!-- body container-->
        <h1 id="pagetitle">Sign Up</h1>


        <div class="container">
            <div class="row">
                <form class="col-md-12">
                    <div class="form-group row justify-content-center">
                        <div class="dropdown">
                            <select id="type">
                                <option selected>Select Account Type</option>
                                <option value="Advertiser">Advertiser</option>
                                <option value="Podcaster">Podcaster</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="firstname" class="ml-2 col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" id="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="lastname" class="ml-2 col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="Phone" class="ml-2 col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" id="Phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="Company" class="ml-2 col-sm-2 col-form-label">Company/Agency</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" id="Company" placeholder="Company/Agency">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="username" class="ml-2 col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="Password1" class="ml-2 col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6 mr-2">
                            <input type="password" id="Password1" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="Password2" class="ml-2 col-sm-2 col-form-label">Verify Password</label>
                        <div class="col-sm-6 mr-2">
                            <input id="Password2" class="form-control" type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="email" class="ml-2 col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6 mr-2">
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="form-group row justify-content-center">
                            <label>By Sign up you agree to iterms <a href="#">term of service</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         

         
        <center>
            <div classs="btn_adv_pod">
                <button class=" col-5 col-md-4 mr-4 btn btn-outline-warning btn-md"  type="submit" formmethod="POST">Submit</button>
            </div>
            <p>Already have an account?<a href="login.html">Log In</a></p>
        </center>
         
    
    
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
