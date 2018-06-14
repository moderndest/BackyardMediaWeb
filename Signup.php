<!--
    - Backyard Media 
    - Filename: Signup.html
    - @author: Haocheng Li
    - @author: Chatsuda Rattarasan
    - (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: June 5 2018    
    - For the full copyright and license information, please view the LICENSE
-->

<?php 
$errors = [];
if (isset($_POST['register'])) {
    require_once './php/includes/connectDB.php';
     // insert a row
    $expected = ['username', 'pwd', 'confirm','name','email','company'];

    $phone = $_POST['phone'];

    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value){
        if(in_array($key, $expected)){
            $$key = trim($value);
            if (empty($$key)){
                $errors[$key] = 'This field requires a value.';
            }
        }
    }
    // Proceed only if there are no errors
    if(!$errors){
        if($pwd != $confirm){
            echo'1';
            $errors['nomatch'] = 'Paswords do not match.';
        }else {
            echo'2';
            // Check that the username hasn't already been registered
            $sql = 'SELECT COUNT(*) FROM users WHERE username = :username';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            if($stmt->fetchColumn() != 0) {
                $errors['failed'] = "$username is already registerd. Choose another name.";
            } else {
                try{
                    // Generate a random 8-character user key and insert values into the database
                    $user_key = hash('crc32', microtime(true) . mt_rand() . $username);
                    
                    $sql = 'INSERT INTO users (user_key, username, pwd, name, email, phone, conmpany)
                            VALUES (:key, :username, :pwd, :name, :email, :phone, :company)';
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':key', $user_key);
                    $stmt->bindParam(':username', $username);
                    // Store an encrypted version of the password
                    $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
                    $stmt->bindParam(':name', $name);
                    echo $name;
                    $stmt->bindParam(':email', $email;
                    echo $email;
                    $stmt->bindParam(':phone', $phone);
                    echo $phone;
                    $stmt->bindParam(':company', $);
                    echo $company;
                    $stmt->execute();
                    echo "New records created successfully";

                } catch(\PDOException $e){
                    if(0 === strpos($e->getCode(), '23')){
                        // If the user key is a duplicate, regenerate, and execute INSERT statement agian
                        $user_key = hash('crc32', microtime(true) . mt_rand() . $username);
                        if(!$stmt->execute()){
                            echo "Error: " . $e->getMessage();
                            throw $e;
                        }
                    }

                }
                // The rowCount() method return 1 if the record is inserted.
                // so redirect the user to the login page
                if($stmt->rowCount()){
                    header('Location: login.php');
                    exit;
                }
            }
        }
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
        <link rel="stylesheet" href="css/contactus.css">
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
            
        <!-- <nav class="navbar fixed-top navbar-expand-lg bg-custom">
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
                        <a class="nav-link" href="Faqs.html">Faqs</a>
                    </li>
                    <li class="nav-item mr-md-4 mx-0">
                            <a class="nav-link" href="contact.html">Contact Us</a>
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
        </nav> -->

        <!--- end of header Navigation---->
        
        </header>
        
    <!-- end of the header -->
     
         
    <!-- body container-->
        <h1 id="pagetitle">Advertisers<p>Sign up</p></h1>
        


        <div class="container">
            <div class="row">

                <!-- Sign up form start here -->
                <form class="col-md-12" action ="<?= $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                    
                    <!-- Name -->
                    <div class="form-group row justify-content-center">
                        <label for="name" class="ml-2 col-md-2 col-form-label">Name *</label>
                        <div class="col-md-6 mr-2">
                            <input type="text" class="form-control" id="name" name="name"placeholder="Name">
                            <?php
                                if (isset($errors['name'])){
                                    echo $errors['name'];
                                }
                            ?>
                           
                        </div>
                    </div>

                    <!-- email -->
                    <div class="form-group row justify-content-center">
                        <label for="email" class="ml-2 col-md-2 col-form-label">Email *</label>
                        <div class="col-md-6 mr-2">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <?php
                                if (isset($errors['email'])){
                                    echo $errors['email'];
                                }
                            ?>
                        </div>
                    </div>

                    <!-- phone -->
                    <div class="form-group row justify-content-center">
                        <label for="phone" class="ml-2 col-md-2 col-form-label">Phone</label>
                        <div class="col-md-6 mr-2">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                    </div>

                    <!-- Company name -->
                    <div class="form-group row justify-content-center">
                        <label for="company" class="ml-2 col-md-2 col-form-label">Company/Agency *</label>
                        <div class="col-md-6 mr-2">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Company/Agency">
                            <?php
                                if (isset($errors['company'])){
                                    echo $errors['company'];
                                }
                            ?>
                        </div>
                    </div>


                    <!-- username -->
                    <div class="form-group row justify-content-center">
                        <label for="username" class="ml-2 col-md-2 col-form-label">Username *</label>
                        <div class="col-md-6 mr-2">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">

                
                                <?php
                                    if (isset($username) &&  !isset($errors['username'])) {
                                        echo 'value="' . htmlentities($username) .'"';
                                    }
                                    if (isset($errors['username'])) {
                                        echo $errors['username'];
                                    } elseif (isset($errors['failed'])){
                                        echo $errors['failed'];
                                    }
                                ?>                 
                            
                        </div>
                    </div>

                    <!-- password -->
                    <div class="form-group row justify-content-center">
                        <label for="pwd" class="ml-2 col-md-2 col-form-label">Password *</label>
                        <div class="col-md-6 mr-2">
                            <input type="password" id="pwd" class="form-control" name="pwd" placeholder="Password">
                            <div>
                                <?php
                                    if (isset($errors['pwd'])){
                                        echo $errors['pwd'];
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- confirm password -->
                    <div class="form-group row justify-content-center">
                        <label for="confirm" class="ml-2 col-md-2 col-form-label">Verify Password *</label>
                        <div class="col-md-6 mr-2">
                            <input id="confirm" name="confirm" class="form-control" type="password" placeholder="Password">
                            <div>
                                <?php
                                    if (isset($errors['confirm'])){
                                        echo $errors['confirm'];
                                    } elseif (isset($errors['nomatch'])){
                                        echo $errors['nomatch'];
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- term of service -->
                    <div class="form-group row justify-content-center">
                        <div class="form-group row justify-content-center">
                            <label>By Sign up you agree to iterms <a href="#">term of service</a></label>
                        </div>
                    </div>
                    
                     <!-- signup btn -->
                    <div class="form-group row justify-content-center">
                        <div class="col-12 d-flex justify-content-center">
                            <input class=" col-5 col-md-4 btn btn-outline-warning btn-md"  type="submit" name="register" id="register" value="Submit">
                        </div>
                    </div>

                    <div class="col-12 p-4 d-flex justify-content-center">
                        <p>Already have an account?<a href="login.html">Log In</a></p>
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
    </body>
</html>
