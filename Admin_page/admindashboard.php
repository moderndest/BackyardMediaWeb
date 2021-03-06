<!Doctype html>
<!--
    - Backyard Media 
    - Filename: admindashboard.html
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: May 29 2018
    - For the full copyright and license information, please view the LICENSE   
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Backyard Media Administrators</title>
        <link rel="stylesheet" href="../css/admin.css">
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script> 
            
    </head>
    <body class="bgcolor">
        
        <!-- header Start here -->
        <header>
            <div class="container-fluid">
                <div class="row">
                    <a class="logo col-md-10" href="admindashboard.html"><img src="../img/logo.png" width="180px"></a>
                    <div class="col-md-2 d-flex justify-content-center">
                        <p class="blue"><i class="far fa-user-circle  blue mx-3"></i>username</p>
                    </div>
                </div>
            </div>
        </header>
         <!-- end of header Start here -->

        <!-- Body Content Start here -->
        <h1 class="Adminheading col-12">ADMINISTRATORS</h1>
        <div class="container ">
            <div class="dash row my-4">
                
                <div class="col-12 col-md-4 justify-content-center">
                    <div class="col-12 p-4">
                        <img class="mx-auto d-block" src="../img/television.png">
                    </div>
                    <a href="listsAd.php" class="col-12  btn btn-warning" role="button">Lists of Advertisers</a>

                </div>
                <div class="col-12 col-md-4">
                    <div class="col-12 p-4">
                        <img class="mx-auto d-block" src="../img/microphone.png">
                    </div>
                    <a href="listPod.html" class="col-12  btn btn-warning" role="button">Lists of Podcasters</a>
                </div>
                <div class="col-12 col-md-4">
                    <div class="col-12 p-4">
                        <img class="mx-auto d-block" class="" src="../img/network.png">
                    </div>
                    <a href="advertisement.html" class="col-12 btn btn-warning" role="button">Advertisement</a>
                </div>
              
            </div>

        </div>

        <!-- end of Body Content Start here -->
        

    </body>



</html>