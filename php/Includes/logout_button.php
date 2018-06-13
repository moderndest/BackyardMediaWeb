<form action="logout.php" method="post">
    <input type = "submit" name="logout" value="Log Out">
    <?php $_SEESION['return_to'] = $_SEESION['PHP_SELF']; ?>
</form>