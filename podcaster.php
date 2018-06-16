
<!Doctype html>
<!--
    - Backyard Media 
    - Filename: podcaster.html
    - @author: Chatsuda Rattarasan
    - @author: Ngoc Tran
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: May 29 2018   
    - For the full copyright and license information, please view the LICENSE
-->
<html>

    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Backyard Media</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/podcaster.css">
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
                    <!-- <i class="fas fa-user fa-2x blue"></i> -->
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

        <h1 class="pagetitle">ARE YOU INTERESTED IN BECOMING A PODCASTER?</h1>


        <div class="container my-4">
            <div class="row">
                <form class="col-md-12 contact-form" action="php/podcasterMail.php" method="post" role="form" novalidate >


                    <!-- Contact Name -->
                    <div class="form-group row justify-content-center">
                        <label for="inputContactName" class=" col-sm-2 col-form-label">Contact Name</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" name="contactname" id="inputContactName" placeholder="Contact Name" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     Contact Name is required.
                            </div>
                        </div>
                    </div>


                    <!--email  -->
                    <div class="form-group row justify-content-center">
                        <label for="inputContactEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6 mr-2">
                            <input type="email" class="form-control" name="email" id="inputContactEmail" placeholder="Email" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     Email is required.
                            </div>
                        </div>


                    <!--Name of podcast-->
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputNameOfPodcast" class="col-sm-2 col-form-label">Name of Podcast</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" name="podname" id="inputNameOfPodcast" placeholder="Name of Podcast" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     Podcast Name is required.
                            </div>
                        </div>
                    </div>


                    <!--Link to podcast-->
                    <div class="form-group row justify-content-center">
                        <label for="inputLinktoPodcast" class="col-sm-2 col-form-label">Link to Podcast</label>
                        <div class="col-sm-6 mr-2">
                            <input type="link" class="form-control" name="link" id="inputLinktoPodcast" placeholder="Link to Podcast" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     Link to podcast is required.
                            </div>
                        </div>
                    </div>


                    <!--Description podcast-->
                    <div class="form-group row justify-content-center">
                            <label for="inputPodcastDescription" class="col-sm-2 col-form-label">Podcast Description</label>
                            <div class="col-sm-6 mr-2">
                                <input type="text" class="form-control" name="description" id="inputPodcastDescription" placeholder="Podcast Description" required>
                                <div class="valid-feedback">
                                    
                                </div>

                                <div class="invalid-feedback">
                                        Description is required.
                                </div>
                            </div>
                    </div>


                    <!--Graphic-->
                    <div class="form-group row justify-content-center">
                            <label  class="col-sm-2 col-form-label">Graphic/Logo</label>
                            <div class="col-sm-6 mr-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="fileupload" id="uploadfile">
                                    <label class="custom-file-label" for="uploadfile">Choose file</label>
                                    <div class="valid-feedback">
                                    
                                    </div>

                                    <div class="invalid-feedback">
                                            password is required.
                                    </div>
                                </div>
                                
                            </div>

                    </div>


                    <!--date of resealse-->
                    <div class="form-group row justify-content-center">
                        <label for="inputDateofFirstRelease" class="col-sm-2 col-form-label">Date of First Release</label>
                        <div class="col-sm-6 mr-2">
                            <input type="date" class="form-control" name="firstrelease" id="inputDateofFirstReleas" required>

                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                        Date of First Release is required.
                            </div>
                        </div>
                    </div>


                    <!--Release Schedule-->
                    <div class="form-group row justify-content-center">
                        <label for="inputReleaseSchedule" class="col-sm-2 col-form-label">Release Schedule</label>
                        <div class="col-sm-6 mr-2">
                            <input type="text" class="form-control" id="inputReleaseSchedule" name="Release" placeholder="Release Schedule" required>
                            <div class="valid-feedback">
                                    
                            </div>

                            <div class="invalid-feedback">
                                     Release Schedule is required.
                            </div>
                        </div>
                    </div>


                    <!--Download per episode-->
                    <div class="form-group row justify-content-center">
                        <label for="inputDownloadPerEpisode" class="col-sm-2 col-form-label">Download Per Episode</label>
                            <div class="col-sm-6 mr-2">
                                <input type="text" class="form-control" name="download" id="inputDownloadPerEpisode" placeholder="Download Per Episode" required>
                                <div class="valid-feedback">
                                        
                                </div>

                                <div class="invalid-feedback">
                                        Download Per Episode is required.
                                </div>
                            </div>
                    </div> 


                    <!--other audience metrix-->
                    <div class="form-group row justify-content-center">
                            <label for="inputAudienceMetrix" class="col-sm-2 col-form-label">Audience Metrix</label>
                                <div class="col-sm-6 mr-2">
                                    <input type="text" class="form-control" name="audienceMetrix" id="inputAudienceMetrix" placeholder="Audience Metrix" required>
                                    <div class="valid-feedback">
                                    
                                    </div>

                                    <div class="invalid-feedback">
                                            password is required.
                                    </div>
                                </div>
                        </div> 


                    <!--Comment-->
                    <div class="form-group row justify-content-center">
                        <label for="inputComment" class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-6 mr-2">
                            <textarea type="text" class="form-control" name="comment" id="inputComment" rows="5"  placeholder="Comment"></textarea>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Please,leave us a message.
                            </div>
                        </div>
                    </div>
                    


                    <!--submit-->    
                    <div class="form-group row my-4">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-warning pdsubmitbtn btn-md">Submit</button>
                        </div>
                    </div>
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
    <script src="js/podcasters.js"></script>
    
    
    </body>
</html>
