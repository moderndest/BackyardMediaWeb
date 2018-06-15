<form action="logout.php" method="post">   
    <button class='mx-3 d-inline btnstyle' type = "submit" name="logout"><i class='fas fa-sign-out-alt fa blue'></i> Exit</button>
    
    <?php $_SESSION['return_to'] = $_SERVER['PHP_SELF']; ?>
</form>