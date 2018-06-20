<!--
    - Backyard Media 
    - Filename: listsAd.html
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: May 29 2018   
    - For the full copyright and license information, please view the LICENSE
-->

<!Doctype html>
<?php
require_once './phpControl/includes/connectDB.php';
session_start();
// Check that the username hasn't already been registered
$sql = 'SELECT A.Name, U.name, U.phone, U.email, A.Previous_ads, A.Upcoming_ads, A.Notes
        FROM Advertisers A JOIN users U ON A.Name = U.company';
$stmt = $db->prepare($sql);
$stmt->execute();

$_SESSION['advertiser'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

$ad = $_SESSION['advertiser'];


foreach($ad as $row )
{
    print_r( $row );
}
	
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Backyard Media Administrators</title>
        <link rel="stylesheet" href="./../css/admin.css">
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="./../bootstrap/dist/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script type="text/javascript" src="./../js/popper.min.js"></script>
        <script type="text/javascript" src="./../bootstrap/dist/js/bootstrap.min.js"></script> 
            
    </head>
    <body class="bgcolor">
        <!-- header Start here -->
        <header>
            <div class="container-fluid">
                <div class="row">
                    <a class="logo col-md-10" href="admindashboard.php"><img src="./../img/logo.png" width="180px"></a>
                    <div class="col-md-2 d-flex justify-content-center">
                        <i class="usericon far fa-user-circle blue mx-3"></i>
                        <p class="blue">username</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- end of header Start here -->
        
        <h1 class="Adminheading col-12">Advertisers Dashboard</h1>
       
        <div class="container-fluid">
       
            <!-- Advertisers form start here -->
                <form id="adform" class="my-4" action="" method="post">
                    <div class="table-responsive">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" style="width: 16.66%" >Company Name</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Previous Ads</th>
                                        <th scope="col">Up Coiming Ads</th>
                                        <th scope="col">Notes</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                              
                                    $num =1;
                                    for($i = 0; $i < count($ad); ++$i )
                                    {
                                    echo "<tr >";
                                    echo "<th scope='row'>".$num++."</th>"; 
                                    //COMPANY
                                    echo "<td><label for='company'></label>";
                                    echo "<input name='company' type='text' class='col-12' id='company' value='".$ad[$i]['Name']."' readonly = 'true' /></td>";

                                    //name
                                    echo "<td><label for='name'></label>";
                                    echo "<input name='name' type='text' class='' id='name' value='".$ad[$i]['name']."' readonly = 'true' /></td>";

                                    //name
                                    echo "<td><label for='phone'></label>";
                                    echo "<input name='phone' type='text' class='' id='phone' value='".$ad[$i]['phone']."' readonly = 'true' /></td>";

                                    //email
                                    echo "<td><label for='email'></label>";
                                    echo "<input name='email' type='text' class='' id='phone' value='".$ad[$i]['email']."' readonly = 'true' /></td>";

                                    //Previous ads
                                    echo "<td><label for='preads'></label>";
                                    echo "<input name='preads' type='text' class='' id='preads' value='".$ad[$i]['Previous_ads']."' readonly = 'true' /></td>";

                                    //Previous ads
                                    echo "<td><label for='comingads'></label>";
                                    echo "<input name='comingads' type='text' class='' id='comingads' value='".$ad[$i]['Upcoming_ads']."' readonly = 'true' /></td>";

                                    //Previous ads
                                    echo "<td><label for='notes'></label>";
                                    echo "<input name='notes' type='text' class='' id='notes' value='".$ad[$i]['Notes']."' readonly = 'true' /></td>";
                                    
                           
                                    echo '</tr>';
                                    }
                                        
                                        
                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            <!-- end of Advertisers form here -->
            

        </div>
        

    </body>



</html>