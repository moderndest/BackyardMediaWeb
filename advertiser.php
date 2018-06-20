
<!--
    - Backyard Media 
    - Filename: index.html
    - @author: Haocheng Li
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: Jun 12 2018 
    - For the full copyright and license information, please view the LICENSE  
-->

<?php
require_once './phpControl/includes/connectDB.php';
session_start();
// Check that the username hasn't already been registered
$sql = 'SELECT * FROM Podcasters';
$stmt = $db->prepare($sql);
$stmt->execute();

$_SESSION['podcasters'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

$pod = $_SESSION['podcasters'];

// Check that the username hasn't already been registered
// $sql = 'SELECT * FROM PodcastsType ';
// $stmt = $db->prepare($sql);
// $stmt->execute();

// $_SESSION['podcasters'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

// $pod = $_SESSION['podcasters'];


foreach($pod as $row )
{
   // print_r( $row );
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
        <!-- <link rel="stylesheet" href="css/advertiser.css"> -->
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/nav.js"></script>
        <!-- <script type="text/javascript" src="js/advertiser.js"></script> -->
        
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
        
        <h1 class="pagetitle">Create New Campaign</h1>


        <!-- table -->
     
        <div id="myBtnContainer" class="col-sm-12 d-flex justify-content-center">

            <div class="p-2">
                <button class="btn active" onclick="filterSelection('all')">All</button>
            </div>

            <div class="p-2">
            <button class="btn" onclick="filterSelection('News')"> News</button>
            </div>

            <div class="p-2">
            <button class="btn" onclick="filterSelection('Laws')"> Laws</button>
            </div>

            <div class="p-2">
            <button class="btn" onclick="filterSelection('Technology')"> Technology</button>
            </div>

            <div class="p-2">
            <button class="btn" onclick="filterSelection('Art')"> Art</button>
            </div>
        </div>
        
        <div class="container-fluid">

                        <?php
            
                        
                        // if(){}
                        echo "<div class='row filterDiv p-5'>";
                        // }
                            for($i = 0; $i < count($pod); ++$i )
                            {
                                // echo "<tr class='p-4'>";
                        


                               
                                
                                echo "<div class='row col-md-12  p-4''>";
                                //////////////// Image /////////////////////////////
                                echo "<div class='my-4 col-sm-12 col-md-4 justify-content-center'>";
                                echo "<img class='rounded'style='width: 300px; height: 300px;' src='data:image/jpeg;base64,".base64_encode($pod[$i]['img'])."'>";
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
                                
                                // if (isset($_SESSION['username']))
                                // {
                                    echo "<form action='advertiserform.php' method='post' role='form'>";
                                    echo "<button type='submit' class='col-5 btn btn-outline-warning btn-md' name='submit' value=".$i." role='button'>Create</button>";
                                    echo "</form>";
                                
                                // }
                                // else{
                                    
                                //     echo "<a href='Signup.php' class='col-5 btn btn-outline-warning btn-md' role='button'>Create</a>";
                                   
                                // }

                                echo "</div>";
                    
                               
                                echo "</div>";
                                echo '<hr>';
                                
                                

                                
                             
                                
                            }
                            echo "</div>";
                        ?>
           

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

        <!-- <script type="text/javascript" src="js/advertiser.js"></script> -->

        <script>
        filterSelection("all")
            function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                filterRemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) filterAddClass(x[i], "show");
            }
            }

            // Show filtered elements
            function filterAddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
                }
            }
            }

            // Hide elements that are not selected
            function filterRemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1); 
                }
            }
            element.className = arr1.join(" ");
            }

            // Add active class to the current control button (highlight it)
            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
            }
        </script>
        
        
         
        
    </body>
</html>