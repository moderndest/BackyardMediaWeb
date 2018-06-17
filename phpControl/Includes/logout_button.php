
 <!-- * Backyard Media 
 - Filename: Logout_button.php
 - 
 - @author Chatsuda Rattarasan
 - 
 - Credits
 - 
 - Created for the Everything About Backyard Media Sites
 - 
 - Date created: June 13 2018 
 - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 -
 - For the full copyright and license information, please view the LICENSE 
-->
<!Doctype html>


<html>
<head> 
</head>
<form class="d-inline" action="logout.php" method="post">   
    <button class=' fas fa-sign-out-alt fa-2x logout blue' type = "submit" name="logout"></button>
    <?php $_SESSION['return_to'] = $_SERVER['PHP_SELF']; ?>
</form>